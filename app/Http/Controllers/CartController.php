<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class CartController extends Controller {
    public function add(Request $request) {
        $cart = session()->get('cart', []);
        $itemId = $request->input('item_id');
        $quantity = $request->input('quantity', 1);

        if (isset($cart[$itemId])) {
            $cart[$itemId]['quantity'] += $quantity;
        } else {
            $item = Item::findOrFail($itemId);
            $cart[$itemId] = [
                'name' => $item->name,
                'price' => $item->price,
                'quantity' => $quantity,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->route('cart.view');
    }

    public function update(Request $request) {
        $cart = session()->get('cart', []);
        $itemId = $request->input('item_id');
        $quantity = $request->input('quantity');

        if (isset($cart[$itemId])) {
            $cart[$itemId]['quantity'] = $quantity;
            if ($quantity <= 0) {
                unset($cart[$itemId]);
            }
        }

        session()->put('cart', $cart);
        return redirect()->route('cart.view');
    }

    public function remove(Request $request) {
        $cart = session()->get('cart', []);
        $itemId = $request->input('item_id');
        unset($cart[$itemId]);

        session()->put('cart', $cart);
        return redirect()->route('cart.view');
    }

    public function viewCart() {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }
}

