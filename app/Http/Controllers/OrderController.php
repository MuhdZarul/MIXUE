<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller {
    public function placeOrder() {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.view')->with('error', 'Your cart is empty!');
        }

        $totalPrice = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        $order = Order::create([
            'user_id' => null, // For guest orders
            'total_price' => $totalPrice,
        ]);

        foreach ($cart as $itemId => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'item_id' => $itemId,
                'quantity' => $item['quantity'],
            ]);
        }

        session()->forget('cart');
        return redirect()->route('order.transactions');
    }

    public function transactions() {
        $orders = Order::with('items')->get();
        return view('orders.index', compact('orders'));
    }
}

