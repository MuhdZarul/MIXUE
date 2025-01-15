<?php
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController {
    public function placeOrder($cart) {
    // Get the authenticated user's ID
    $userId = auth()->id();

    if (!$userId) {
        }
    }
    }

    // Calculate the total price
    $totalPrice = 0;
    foreach ($cart as $menuId => $item) {
        $totalPrice += $item['quantity'] * $item['price']; // Ensure 'price' exists in $cart
    }

    // Use a database transaction for reliability
    DB::beginTransaction();
    try {
        // Create the Order
        $order = Order::create([
            'user_id' => $userId,
            'total_price' => $totalPrice,
        ]);

        // Create OrderItems
        foreach ($cart as $menuId => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'menu_id' => $menuId,
                'quantity' => $item['quantity'],
            ]);
        }

        DB::commit();
        return response()->json(['message' => 'Order placed successfully.', 'order' => $order], 201);

    } catch (\Exception $e) {
        DB::rollBack();
        return response()->json(['message' => 'Failed to place order.', 'error' => $e->getMessage()], 500);
    }

