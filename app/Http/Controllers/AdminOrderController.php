<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class AdminOrderController extends Controller
{
     // List orders
    public function index()
    {
        $orders = Order::latest()->get();
        return view('admin-panel.orders.order', compact('orders'));
    }

    // Order details
    public function show(Order $order)
    {
        $order->load('items.product');
        return view('admin-panel.orders.show', compact('order'));
    }

    // Update status
    public function updateStatus(Request $request, Order $order)
    {
        $order->status = 'completed';
        $order->save();

        return back()->with('success','Order marked as completed');
    }
}
