<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return response()->json(Order::all());
    }

    public function show($id){
        $order = Order::findOrFail($id);
        return response()->json($order);
    }
}
