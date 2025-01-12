@extends('layout.layout')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart - Mixue Ordering System</title>
    <style>

        /* Global reset to remove default margins and padding
        html, body {
            margin: 0;
            padding: 0;
            width: 100%;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
        }

        /* Header styles
        .header {
            background-color: #e60000;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            box-sizing: border-box;
        }

        header img {
            height: 40px;
        }

        /* Navbar styles
        nav ul {
            list-style: none;
            display: flex;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            margin: 0 15px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            font-size: 20px;
        }

        .logo {
            width: 250px;
            height: auto;
        }

        /* Footer styles
        footer {
            background-color: #333;
            color: white;
            padding: 20px 10px;
            text-align: center;
            margin-top: 40px;
        }

        footer .footer-content {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        footer .footer-section {
            margin: 10px 0;
            width: 30%;
        }

        footer .footer-section h4 {
            margin-bottom: 10px;
            font-size: 18px;
            text-transform: uppercase;
        }

        footer .footer-section p, footer .footer-section a {
            margin: 5px 0;
            color: #ccc;
            font-size: 14px;
            text-decoration: none;
        }

        footer .footer-section a:hover {
            color: white;
        }

        footer .copyright {
            margin-top: 20px;
            font-size: 12px;
            color: #aaa;
        }

        */
        /* Container styling */
        .container {
            width: 100%; /* Ensure the container takes up full width */
            margin: 0; /* Remove any margin */
            padding: 0; /* Remove any padding */
            box-sizing: border-box;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Cart table styles */
        .cart-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        .cart-table th, .cart-table td {
            text-align: left;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .cart-table th {
            background-color: #f8f8f8;
        }

        /* Quantity control button styles */
        .quantity-control {
            display: flex;
            align-items: center;
        }

        .quantity-control button {
            background-color: #e3000f;
            color: white;
            border: none;
            width: 30px;
            height: 30px;
            text-align: center;
            line-height: 30px;
            cursor: pointer;
            border-radius: 4px;
        }

        .quantity-control input {
            text-align: center;
            width: 50px;
            margin: 0 5px;
        }

        /* Total price section */
        .cart-total {
            font-weight: bold;
            text-align: right;
            padding: 10px;
        }

        /* Actions buttons */
        .actions {
            display: flex;
            justify-content: space-between;
            padding: 10px;
        }

        .actions button {
            background-color: #e3000f;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
        }

        .actions button:hover {
            background-color: #c0000c;
        }

        /* Empty cart message */
        .empty-cart {
            text-align: center;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
    <!--   <div class="header">
            <h2><img src="assets/img/mixue_logo.png" alt="Mixue Logo"> MIXUE Ordering System</h2>
        </div>
      <nav>
            <ul>
                <li><a href="/">HOME</a></li>
                <li><a href="#">MENU</a></li>
                <li><a href="#"><img src="assets/img/shopping-cart.png" alt="Cart" style="height: 20px;"></a></li>
                <li><a href="#"><img src="assets/img/user.png" alt="Profile" style="height: 20px;"></a></li>
            </ul>
        </nav>
    -->
        @if(session('cart') && count(session('cart')) > 0)
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Food ID</th>
                        <th>Item</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach(session('cart') as $id => $details)
                        @php $total += $details['price'] * $details['quantity']; @endphp
                        <tr>
                            <td>#{{ $id }}</td>
                            <td>{{ $details['name'] }}</td>
                            <td>RM {{ number_format($details['price'], 2) }}</td>
                            <td>
                                <div class="quantity-control">
                                    <form action="{{ route('cart.update') }}" method="POST" style="display: inline;">
                                        @csrf
                                        <input type="hidden" name="item_id" value="{{ $id }}">
                                        <button type="submit" name="quantity" value="{{ $details['quantity'] - 1 }}">-</button>
                                    </form>
                                    <input type="text" value="{{ $details['quantity'] }}" readonly>
                                    <form action="{{ route('cart.update') }}" method="POST" style="display: inline;">
                                        @csrf
                                        <input type="hidden" name="item_id" value="{{ $id }}">
                                        <button type="submit" name="quantity" value="{{ $details['quantity'] + 1 }}">+</button>
                                    </form>
                                </div>
                            </td>
                            <td>
                                <form action="{{ route('cart.remove') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="item_id" value="{{ $id }}">
                                    <button type="submit" style="background: none; border: none; color: #e3000f; cursor: pointer;">🗑</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="cart-total">TOTAL: RM {{ number_format($total, 2) }}</div>
            <div class="actions">
                <a href="{{ route('menu.index') }}"><button>Back</button></a>
                <form action="{{ route('order.place') }}" method="POST">
                    @csrf
                    <button type="submit">Place Order</button>
                </form>
            </div>
        @else
            <div class="empty-cart">
                <h3>Your cart is empty!</h3>
                <a href="{{ route('menu.index') }}"><button>Back</button></a>
            </div>
        @endif
    </div>
</body>
</html>
@endsection
