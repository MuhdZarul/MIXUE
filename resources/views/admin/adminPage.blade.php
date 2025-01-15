@extends('layout.layout')

@section('content')

    <h1>Admin Dashboard</h1>
    
    <div class="container">
        <div class="menu">
            <a href="{{ route('menu.create') }}" class="menu-button">Add Menu</a>
            <a href="{{ route('menu.edit') }}" class="menu-button">Update Menu</a>
            <a href="{{ route('menu.delete') }}" class="menu-button">Delete Menu</a>
            <a href="{{ route('transaction.index') }}" class="menu-button">View Transaction</a>
        </div>
    </div>

    <style>
        /* General body and layout styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        /* Ensure header and footer have proper size */
        header, footer {
            font-size: 2rem;  /* Set header and footer font size */
            padding: 20px 0;  /* Add padding to top and bottom */
            width: 100%;
            color: white;
            text-align: center;
        }

        h1 {
            font-size: 3rem;  /* Large heading size */
            color: #2c3e50;
            margin-bottom: 40px;
            font-weight: bold;
        }

        .container {
            width: 100%;
            max-width: 1200px;  /* Adjust width for desktop */
            padding: 0 40px;
        }

        .menu {
            display: flex;
            justify-content: center;
            gap: 40px;  /* Increased gap between buttons */
            margin-top: 40px;
        }

        .menu-button {
            padding: 20px 40px;  /* Larger button padding */
            background-color: #e60000;
            color: white;
            font-weight: bold;
            text-decoration: none;
            border-radius: 8px;
            font-size: 20px;  /* Larger button font size */
            transition: all 0.3s ease;
            display: inline-block;
            width: 250px;  /* Button width */
            text-align: center;
        }

        .menu-button:hover {
            background-color: #c0392b;
            transform: scale(1.05);
        }

        .menu-button:active {
            background-color: #e60000;
            transform: scale(1);
        }
    </style>

@endsection
