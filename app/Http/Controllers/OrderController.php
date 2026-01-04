<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
{
    $request->validate([
        'first_name'=>'required',
        'last_name'=>'required',
        'address'=>'required',
        'city'=>'required',
        'country'=>'required',
        'postcode'=>'required',
        'mobile'=>'required',
        'email'=>'required|email',
    ]);

    $cart_prods = Cart::where('user_id', Auth::id())->get();

    $total = $cart_prods->sum(fn($c) => $c->quantity * $c->product->discount_price);

    $order = Order::create([
        'user_id'=>Auth::id(),
        'first_name'=>$request->first_name,
        'last_name'=>$request->last_name,
        'company'=>$request->company,
        'address'=>$request->address,
        'city'=>$request->city,
        'country'=>$request->country,
        'postcode'=>$request->postcode,
        'mobile'=>$request->mobile,
        'email'=>$request->email,
        'total_amount'=>$total,
    ]);

    foreach ($cart_prods as $cart) {
        OrderItem::create([
            'order_id'=>$order->id,
            'product_id'=>$cart->product_id,
            'quantity'=>$cart->quantity,
            'price'=>$cart->product->discount_price,
        ]);
    }

    // Clear cart
    Cart::where('user_id', Auth::id())->delete();

    return redirect()->route('home')->with('success','Order placed successfully');
}

 public function orders()
    {
        $orders = Order::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('orders', compact('orders'));
    }

    // Show single order details
    public function ordershow(Order $order)
    {
        // Security check
        abort_if($order->user_id !== Auth::id(), 403);

        $order->load('items.product');

        return view('ordersshow', compact('order'));
    }
}
