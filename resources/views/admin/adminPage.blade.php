@extends('layout.layout')
@section('content')

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Dashboard</title>
        <!-- Add your CSS styles -->
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f8f9fa;
                text-align: center;
                /* padding: 20px; */
            }
            h1 {
                color: #333;
            }
            .menu {
                margin: 20px auto;
                display: flex;
                justify-content: center;
                gap: 20px;
            }
            .menu a {
                display: inline-block;
                padding: 15px 25px;
                text-decoration: none;
                background-color: #e60000;
                color: #fff;
                font-weight: bold;
                border-radius: 5px;
                transition: background-color 0.3s ease;
            }
            .menu a:hover {
                background-color:rgb(226, 152, 152);
            }
        </style>
    </head>

    <body>
        <h1>Admin Dashboard</h1>
        <div class="menu">
            <a href="{{ route('menu.add') }}">Add Menu</a>
            <a href="{{ route('menu.update') }}">Update Menu</a>
            <a href="{{ route('menu.delete') }}">Delete Menu</a>
        </div>
    </body>
</html>
@endsection