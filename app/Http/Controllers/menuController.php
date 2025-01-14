<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Menu;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class menuController extends Controller
{

    public function index()
    {
        $menus = Menu::all(); // Fetch all menu items from the database
        return view('menu', ['menus' => $menus]);
    }



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
        $validated = $request->validate([
            'Food_ID' => 'required|unique:menus,Food_ID',
            'Food_Name' => 'required',
            'Description' => 'required',
            'Price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $menu = new Menu();
        $menu->Food_ID = $validated['Food_ID'];
        $menu->Food_Name = $validated['Food_Name'];
        $menu->Description = $validated['Description'];
        $menu->Price = $validated['Price'];

        // Upload image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('menu', 'public'); // Ensure public disk is configured
            $menu->image = $path;
        }


        $menu->save();

        return redirect()->route('menu.create')->with('success', 'Menu added successfully!');
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
        $menus = Menu::all(); // Get all menus
        return view('admin.menu-edit', compact('menus')); // Pass the menus to the view
    }


    public function showEditForm($id)
    {
        // Get the specific menu by its ID
        $menu = Menu::find($id);

        // Check if the menu exists
        if (!$menu) {
            return redirect()->route('menu.index')->with('error', 'Menu item not found.');
        }

        // Return the update form view and pass the menu data
        return view('admin.menu-update', compact('menu'));
    }


    // Method to update the menu
    public function update(Request $request, $id)
    {
        $menu = Menu::find($id);

        if (!$menu) {
            return response()->json(['message' => 'Menu item not found'], 404);
        }

        // Validate incoming data
        $validated = $request->validate([
            'Food_Name' => 'required',
            'Description' => 'required',
            'Price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Ensure image is handled if provided
        ]);

        // Update menu details
        $menu->Food_Name = $validated['Food_Name'];
        $menu->Description = $validated['Description'];
        $menu->Price = $validated['Price'];

        // If there's a new image, update it
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($menu->image) {
                Storage::disk('public')->delete($menu->image);
            }

            $image = $request->file('image');
            $path = $image->store('menu', 'public');
            $menu->image = $path;
        }

        // Save the updated menu item
        $menu->save();

        // Redirect to menu index page with success message
        return redirect()->route('menu.index')->with('success', 'Menu updated successfully');

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

    public function destroy($id)
    {
        $menu = Menu::find($id);

        if (!$menu) {
            return redirect()->route('menu.index')->with('error', 'Menu not found');
        }

        // Delete the menu and the associated image file (if you have storage management)
        $menu->delete();

        return redirect()->route('menu.index')->with('success', 'Menu deleted successfully');
    }




}




