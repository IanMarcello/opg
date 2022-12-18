<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Openpesa\Pesa\Facades\Pesa;

class OrderController extends Controller
{
    
    public function index(){
        return response()->json(Order::all());
    }
    
    public function create(StoreOrderRequest $request){
        
        //Writing to the log
        Log::info('Creating order');
        Log::info($request->all());
        Log::info('Validating request payload');
        
        //Data from app request
        $data = $request->validate([
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'phone_number' => 'required|string',
            'email' => 'email',
            'amount' => 'required|numeric',
            'type' => 'string',
            'remark' => 'string|max:255',
            'app_id' => 'integer'
        ]);
        
        //Writing to the log
        Log::info('Payload validated');
        Log::info('Saving order');
        
        //Payload array
        $payload = [
            'pay_number' => 'ODR-'.Str::random(6),
            'third_party_id' => Str::random(5),
            'total_amount' => (float) $data['amount'],
            'currency' => 'TZS',
            'status' => 'PENDING',
            'remark' => $data['remark'] ?? null,
            'mno' => $data['mno'] ?? 'MPesa',
            'buyer' => $data['firstName']." ".$data['lastName'],
            'type' => $data['type'] ?? 'FIXED',
            'app_id' => $data['app_id'] ?? 1,
        ];
        
        //Create order
        $order = Order::create($payload);
        
        //Writing to the log
        Log::info('Order saved');
        Log::info($order);
        
        $response =[];
        try{
            //MPesa C2b transaction
            $response = Pesa::c2b([
                'input_Amount' => $data['amount'], // Amount to be charged
                'input_Country' => 'TZN',
                'input_Currency' => 'TZS',
                'input_CustomerMSISDN' => $data['phone_number'], // replace with your phone number
                'input_ServiceProviderCode' => '000000', // replace with your service provider code given by M-Pesa
                'input_ThirdPartyConversationID' => 'rasderekf', // unique
                'input_TransactionReference' => 'asdodfdferre', // unique
                'input_PurchasedItemsDesc' => 'Test Item',
            ]);
        } catch(\Throwable $t){
            //Writing to the log
            Log::error('MPesa C2B request failed');
            Log::error($response);
            return '{message:"failed"}';
           
            // Create a failed transaction
            Transaction::create([
            'third_party_id' => $response['input_ThirdPartyConversationID'],
            'amount' => $data['amount'],
            'currency' => 'TZS',
            'status' => 'FAILED',
            'remark' => null,
            'order_id' => $order->id,
        ]);
        }
        
        //Writing to the log
        Log::info('Pesa C2B request successful');
        
        //Update the order status
        $order->update(['status' => 'PAID']);
        
        //Create a successful transaction
        Transaction::create([
            'third_party_id' => $response['input_ThirdPartyConversationID'],
            'amount' => $data['amount'],
            'currency' => 'TZS',
            'status' => 'SUCCESSFUL',
            'remark' => null,
            'order_id' => $order->id,
        ]);
        
        //Create the disbursed transaction
        Transaction::create([
            'third_party_id' => $response['input_ThirdPartyConversationID'],
            'amount' => $data['amount'],
            'currency' => 'TZS',
            'status' => 'DISBURSED',
            'remark' => null,
            'order_id' => $order->id,
        ]);
        
        return '{message:"ok"}';
    }
    
    public function show(Order $order)
    {
        return response()->json(200);
    }
}
