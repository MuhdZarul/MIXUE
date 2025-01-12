<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Menu;

use Illuminate\Http\Request;

class menuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::all(); // Fetch all menu items from the database
        return view('menu', ['menus' => $menus]);
    }

    /**
     * Show the form for creating a new resource.
     */

     // Add item to cart
     public function addToCart(Request $request)
     {
         $menuItemId = $request->input('menu_id');
         $cart = Session::get('cart', []);

         if (isset($cart[$menuItemId])) {
             $cart[$menuItemId]['quantity'] += 1;
         } else {
             $menuItem = DB::table('menu')->find($menuItemId);
             $cart[$menuItemId] = [
                 'name' => $menuItem->name,
                 'price' => $menuItem->price,
                 'quantity' => 1,
             ];
         }

         Session::put('cart', $cart);

         return response()->json(['message' => 'Item added to cart successfully', 'cart' => $cart]);
     }
    public function create()
    {
        return view('admin.menu-add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $menus = Menu::all();
        return view('admin.menu-Update', compact('menus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'Food_ID' => 'sometimes|string',
            'Food_Name' => 'sometimes|string|max:255',
            'Description' => 'sometimes|string',
            'Price' => 'sometimes|numeric',
            'image' => 'sometimes|string',
        ]);

        // Find the menu item by ID
        $menu = Menu::findOrFail($id);

        // Update only the fields provided in the request
        $menu->update($request->only(['Food_ID', 'Food_Name', 'Description', 'Price', 'image']));

        return redirect()->back()->with('success', 'Menu item updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */

    // Delete Menu
    public function deletePage()
    {
        $menus = Menu::all();
        return view('admin.menu-Delete', compact('menus'));
    }

    public function destroy(string $id)
    {
        $request->validate(['Food_ID' => 'required|exists:menus,id']);

        Menu::destroy($request->Food_ID);
        return redirect()->back()->with('success', 'Menu item deleted successfully!');
    }
}
