<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        form {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h1>Delivery Form</h1>

    <!-- Success Message -->
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <!-- Delivery Form -->
    <form method="POST" action="{{ route('deliveries.store') }}">
        @csrf
        <label for="customer_name">Customer Name:</label><br>
        <input type="text" id="customer_name" name="customer_name" required><br><br>

        <label for="address">Address:</label><br>
        <textarea id="address" name="address" required></textarea><br><br>

        <label for="delivery_date">Delivery Date:</label><br>
        <input type="date" id="delivery_date" name="delivery_date" required><br><br>

        <button type="submit">Add Delivery</button>
    </form>

    <!-- Delivery Records -->
    <h2>Delivery Records</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer Name</th>
                <th>Address</th>
                <th>Delivery Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($deliveries as $delivery)
                <tr>
                    <td>{{ $delivery->id }}</td>
                    <td>{{ $delivery->customer_name }}</td>
                    <td>{{ $delivery->address }}</td>
                    <td>{{ $delivery->delivery_date }}</td>
                    <td>{{ $delivery->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
