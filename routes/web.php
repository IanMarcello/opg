<?php

use Illuminate\Support\Facades\Route;
use Openpesa\Pesa\Facades\Pesa;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
Route::get('/', function () {
    return redirect()->route('api.orders.show');
});

*/

Route::get('/test-api', function () {
    
    $data = [
        'firstName' => 'Levina',
        'lastName' => 'Pamba',
        'amount' => 100000,
        'phone_number' => '255762897200'
    ];
    
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
    
    dd($response);
});
