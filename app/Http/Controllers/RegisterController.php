<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Ensure User model is imported
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        // Debugging: Log the request data
        \Log::info('Register Request:', $request->all());


        // Validate the form input
        // $request->validate([
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone_no' => 'required|string|max:20',
            'password' => 'required|string|confirmed|min:8',
        ]);

        // Debugging: Confirm validation passed
        \Log::info('Validation passed.');


        // Create the user in the database

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_no' => $request->phone_no,
            'password' => Hash::make($request->password),
        ]);

        // Debugging: Confirm user creation
        \Log::info('User created:', $user->toArray());


        // Optionally, log in the user after registration
        auth()->login($user);

        // Redirect to a dashboard or success page
        return redirect()->route('success')->with('success', 'Registration successful!');
    }
}
