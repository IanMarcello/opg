<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    
    public function index(){
        return response()->json(Order::all());
    }
    
    public function create(){
        
    }
    
    public function show(Order $order)
    {
        return response()->json(200);
    }
}
