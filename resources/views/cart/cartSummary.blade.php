@extends('layout.layout')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Summary</title>
    <style>
        .container {
            width: 100%;
            max-width: 800px;
            margin: auto;
            padding: 20px;
            box-sizing: border-box;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .cart-summary {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        .cart-summary th, .cart-summary td {
            text-align: left;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .cart-summary th {
            background-color: #f8f8f8;
        }

        .cart-summary .total {
            font-weight: bold;
        }

        .actions {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
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
    </style>
</head>
<body>
    <div class="container">
        <h1>Cart Summary</h1>

        @if($order && count($order->items) > 0)
            <table class="cart-summary">
                <thead>
                    <tr>
                        <th>Item</th>

                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $item)
                        <tr>
                            <td>{{ $item->menu->name ?? 'Unknown' }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>RM {{ number_format($item->price * $item->quantity, 2) }}</td>
                            <td>
                                <form action="{{ route('order.item.delete') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="item_id" value="{{ $item->id }}">
                                    <button type="submit" style="background: none; border: none; color: #e3000f; cursor: pointer;">REMOVE</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>

                <tfoot>
                    <tr>
                        <td colspan="3" class="total">Subtotal</td>
                        <td colspan="2">RM {{ number_format($subtotal, 2) }}</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="total">Delivery Fee</td>
                        <td colspan="2">RM {{ number_format($deliveryFee, 2) }}</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="total">Total</td>
                        <td colspan="2">RM {{ number_format($order->total_price, 2) }}</td>
                    </tr>
                </tfoot>

            </table>
        @else
            <p>Your cart is empty.</p>
        @endif
        <div class="actions">
            <a href="{{ route('menu.index') }}"><button>Back to Menu</button></a>
            <a href=><button>Payment</button></a>
        </div>
    </div>
</body>
</html>
@endsection
