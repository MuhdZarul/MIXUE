<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeliveryController extends Controller
{
    public function index()
    {
        $deliveries = DB::table('deliveries')->get(); // Fetch all deliveries
        return view('delivery', ['deliveries' => $deliveries]); // Render the Blade view

    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:100',
            'address' => 'required|string',
            'delivery_date' => 'required|date',
        ]);

        DB::table('deliveries')->insert([
            'customer_name' => $request->customer_name,
            'address' => $request->address,
            'delivery_date' => $request->delivery_date,
            'status' => 'Pending',
        ]);

        return redirect()->route('deliveries.index')->with('success', 'Delivery added successfully!');
    }
}
