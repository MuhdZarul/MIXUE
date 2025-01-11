<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff; /* White background */
            color: black; /* Deep red for text */
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #b30000; /* Deep red header */
            color: white;
            padding: 20px;
            text-align: center;
        }
        header img {
            width: 120px; /* Adjust size of the logo */
            margin-bottom: 10px;
        }

        header h1 {
            margin: 0;
            font-size: 2.5em;
        }
        .container {
            max-width: 800px;
            margin: 30px auto;
            padding: 20px;
            background-color: white; /* White background for content */
            border: 2px solid #b30000; /* Red border for emphasis */
            border-radius: 10px;
        }
        .form-container {
            margin-bottom: 30px;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        label {
            font-weight: bold;
        }
        input, textarea, button {
            padding: 10px;
            border: 1px solid #b30000; /* Red border */
            border-radius: 5px;
            font-size: 16px;
        }
        textarea {
            resize: none;
        }
        button {
            background-color: #b30000; /* Deep red button */
            color: white;
            border: none;
            cursor: pointer;
            transition: transform 0.2s, background-color 0.3s;
        }
        button:hover {
            background-color: #990000; /* Darker red on hover */
            transform: scale(1.05);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border: 2px solid white; /* Red border for the table */
        }
        table th, table td {
            border: 1px solid #b30000; /* Red cell borders */
            padding: 10px;
            text-align: left;
        }
        table th {
            background-color: #b30000; /* Deep red header cells */
            color: white;
        }
        table tbody tr:nth-child(odd) {
            background-color: #ffe5e5; /* Light red for alternating rows */
        }
        table tbody tr:nth-child(even) {
            background-color: #ffffff; /* White for alternating rows */
        }
        .success-message {
            color: black; /* Red success message */
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <header>
        <img src="mixue.jpg" alt="Logo">
        <h1 class="sitename">Deliveries</h1>
        <!--<a href="index.html" class="logo d-flex align-items-center">-->

        <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="/" class="active">Home<br></a></li>
                <!--<li><a href="/students">Student</a></li>-->
            </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
    </div>
    </header>
    <div class="container">
        <!-- Success Message -->
        @if(session('success'))
            <p class="success-message">{{ session('success') }}</p>
        @endif

        <!-- Delivery Form -->
        <!--<div class="form-container">
            <h2>Add a Delivery</h2>
            <form method="POST" action="{{ route('deliveries.store') }}">
                @csrf
                <label for="customer_name">Customer Name:</label>
                <input type="text" id="customer_name" name="customer_name" required>

                <label for="address">Address:</label>
                <textarea id="address" name="address" rows="4" required></textarea>

                <label for="delivery_date">Delivery Date:</label>
                <input type="date" id="delivery_date" name="delivery_date" required>

                <button type="submit">Add Delivery</button>
            </form>
        </div>
        -->

        <!-- Delivery Records -->
        <div class="table-container">
            <h1>Delivery</h1>
            <!--<table>
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
            </table>-->
                <h3>Delivery ID : {{ $delivery->id }}</h3>
                <h3>Name : {{ $delivery->customer_name }}</h3>
                <h3>Address : {{ $delivery->address }}</h3>
                <h3>Delivery Date : {{ $delivery->delivery_date }}</h3>
               <h3>Status : {{ $delivery->status }}</h3>
            </div>
    </div>
</body>
</html>
