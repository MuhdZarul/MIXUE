@extends('layout.layout')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Role</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            /* display: flex; */
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }

        .container {
            text-align: center;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        h1 {
            margin-bottom: 20px;
            color: #333;
        }

        .buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .button {
            display: inline-block;
            padding: 15px 30px;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .button.admin {
            background-color: #007bff;
        }

        .button.admin:hover {
            background-color: #0056b3;
        }

        .button.customer {
            background-color: #28a745;
        }

        .button.customer:hover {
            background-color: #1c7d33;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome! Choose Your Role</h1>
        <div class="buttons">
            <a href="{{ route('admin') }}" class="button admin">Admin</a>
            <a href="{{ route('register') }}" class="button customer">Customer</a>
        </div>
    </div>
</body>
</html>
@endsection
