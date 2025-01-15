<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\Menu;

class CartController extends Controller {
    public function add(Request $request)
{

    $menuId = $request->input('menu_id');
    $quantity = $request->input('quantity', 1); // Default quantity is 1

    $menu = Menu::find($menuId);

    if (!$menu) {
        return redirect()->route('menu.index')->with('error', 'Item not found.');
    }

    $cart = session()->get('cart', []);


    if (isset($cart[$menuId])) {
        $cart[$menuId]['quantity'] += $quantity;
    } else {

        $cart[$menuId] = [
            'name' => $menu->Food_Name,
            'price' => $menu->Price,
            'quantity' => $quantity,
        ];
    }


    session()->put('cart', $cart);

    return redirect()->route('cart.view')->with('success', 'Item added to cart!');
}
    //add item to cart
    public function update(Request $request) {
        $cart = session()->get('cart', []);
        $menuId = $request->input('menu_id');
        $quantity = $request->input('quantity');

        if (isset($cart[$menuId])) {
            $cart[$menuId]['quantity'] = $quantity;
            if ($quantity <= 0) {
                unset($cart[$menuId]);
            }
        }

        session()->put('cart', $cart);
        return redirect()->route('cart.view');
    }
    //utk remove item from cart
    public function remove(Request $request) {
        $cart = session()->get('cart', []);
        $menuId = $request->input('menu_id');
        unset($cart[$menuId]);

        session()->put('cart', $cart);
        return redirect()->route('cart.view');
    }

    public function viewCart() {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }
}
