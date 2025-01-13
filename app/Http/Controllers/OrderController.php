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

        // Calculate the subtotal of the cart
        $subtotal = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        // Define delivery fee
        $deliveryFee = 4;

        // Calculate total price (subtotal + delivery fee)
        $totalPrice = $subtotal + $deliveryFee;

        // Create a new order
        $order = Order::create([
            'user_id' => auth()->id(),
            'total_price' => $totalPrice, 
        ]);


        foreach ($cart as $menuId => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'menu_id' => $menuId,
                'quantity' => $item['quantity'],

            ]);
        }

        session()->forget('cart');

        return redirect()->route('cart.summary');
    }


    public function transactions() {
        $orders = Order::with('items')->where('user_id', auth()->id())->get(); // Retrieve orders for the authenticated user
        return view('orders.index', compact('orders'));
    }


    public function showCartSummary() {

        $order = Order::with('items.menu')
            ->where('user_id', auth()->id())
            ->latest()
            ->first();

        if (!$order) {
            return redirect()->route('cart.view')->with('error', 'No order found!');
        }

        $subtotal = $order->items->sum(function($item) {
            return $item->price * $item->quantity;
        });

        $deliveryFee = 4;

        $total = $subtotal + $deliveryFee;

        return view('cart.cartSummary', compact('order', 'subtotal', 'deliveryFee', 'total'));
    }


    public function deleteItem(Request $request)
{

    $itemId = $request->input('item_id');


    $item = OrderItem::find($itemId);


    if ($item) {
        // Delete the item from the database
        $item->delete();


        $order = Order::find($item->order_id);
        $order->total_price = $order->items->sum(function ($item) {
            return $item->price * $item->quantity;
        });
        $order->save(); // Save the updated order

        // Redirect back to the cart summary page with a success message
        return redirect()->route('cart.summary')->with('success', 'Item removed from cart.');
    }


    return redirect()->route('cart.summary')->with('error', 'Item not found.');
}


}
