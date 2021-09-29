<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function payment(Order $order){

        $items = json_decode($order->content);

        return view('orders.payments', compact('order', 'items'));
    }
}
