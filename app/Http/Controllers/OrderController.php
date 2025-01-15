<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller {
    // untuk place ordr
    public function placeOrder(Request $request) {

        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.view')->with('error', 'Your cart is empty!');
        }
        //dd($cart);

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
            //dd($menuId);
            OrderItem::create([
                'order_id' => $order->id,
                'food_id' => $menuId,
                'quantity' => (int) $item['quantity'],


            ]);

        }

        //session()->forget('cart');

        return redirect()->route('cart.summary');
    }

    public function transactions() {
        $orders = Order::with('items')->where('user_id', auth()->id())->get(); // Retrieve orders for the authenticated user
        return view('orders.index', compact('orders'));
    }

    //cart summary
    public function showCartSummary() {

            $order = Order::where('user_id', auth()->id())->latest()->first();

            if (!$order) {
                return redirect()->route('cart.view')->with('error', 'No order found!');
            }

            // Retrieve order items
            $orderItems = $order->items;

            // Calculate subtotal and other details
            $subtotal = $orderItems->sum(function ($item) {
                return $item->quantity * $item->menu->price;
            });

            $deliveryFee = 4;
            $total = $subtotal + $deliveryFee;

            return view('cart.cartSummary', compact('order', 'orderItems', 'subtotal', 'deliveryFee', 'total'));
        }

            //dd($order);
            //dd($order->items);
            //foreach ($order->items as $item) {
                //dd($item->food_id);  // Check if the menu data is being loaded
            //}


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
