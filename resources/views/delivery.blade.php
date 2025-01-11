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
            padding: 10PX 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        header img {
            height: 50px;
        }
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

        .container {
            max-width: 800px;
            margin: 30px auto;
            padding: 20px;
            background-color: white; /* White background for content */
            border: 2px solid #b30000; /* Red border for emphasis */
            border-radius: 10px;
        }
        /*.form-container {
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
        }*/
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
        <header>
            <div>
                <img src="assets/img/mixue_logo.png" alt="Mixue Logo" class="logo"> <!-- Replace with your logo path -->
            </div>
            <nav>
                <ul>
                    <li><a href="/">HOME</a></li>
                    <li><a href="#">MENU</a></li>
                    <li><a href="/deliveries">DELIVERY</a></li>
                    <li><a href="#"><img src="assets/img/shopping-cart.png" alt="Cart" style="height: 20px;"></a></li>
                    <li><a href="#"><img src="assets/img/user.png" alt="Profile" style="height: 20px;"></a></li>
                </ul>
            </nav>
        </header>



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
