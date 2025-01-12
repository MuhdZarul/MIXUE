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
            background-color: #e60000; /* Deep red header */
            color: white;
            padding: 10PX 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
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
            border-radius: 50px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2), /* Deeper main shadow */
                        0 4px 6px rgba(0, 0, 0, 0.1); /* Subtle secondary shadow */
           }

        .progress-bar-container {
            width: 100%;
            background-color: #ffe5e5; /* Light red background for progress bar */
            border: 2px solid #b30000; /* Red border for emphasis */
            border-radius: 25px;
            margin: 20px 0;
            height: 30px;
            overflow: hidden;
            position: relative;
        }

        .progress-bar {
                width: 60%; /* Set this dynamically based on progress */
                height: 100%;
                background-color: #3bd10d; /* Deep red color for the filled part */
                border-radius: 25px 0 0 25px; /* Round the left side of the bar */
        }

        .progress-label {
                position: absolute;
                width: 100%;
                text-align: center;
                top: 50%;
                transform: translateY(-50%);
                font-weight: bold;
                color: #000000; /* Deep red for text */
                font-size: 20px;
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
        .delivery-header {
            display: flex;
            flex-direction: column; /* Stack the text and logo */
            align-items: center; /* Center horizontally */
            margin-bottom: 20px;
        }

        .delivery-header h1 {
            font-size: 36px; /* Adjust font size for visibility */
            font-weight: bold;
            color: black; /* Match theme color */
            margin: 10px 0;
        }

        .delivery-header .delivery-logo {
            width: 120px; /* Adjust size for better visibility */
            height: auto;
            margin-top: 10px;
        }

    </style>
</head>
<body>
    <header>
        <div>
            <img src="assets/img/mixue_logo.png" alt="Mixue Logo" class="logo">
        </div>
        <nav>
            <ul>
                <li><a href="/">HOME</a></li>
                <li><a href="#">MENU</a></li>
                <li><a href="#"><img src="assets/img/shopping-cart.png" alt="Cart Icon" style="height: 20px;"></a></li>
                <li><a href="#"><img src="assets/img/user.png" alt="Profile Icon" style="height: 20px;"></a></li>
            </ul>
        </nav>
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
            <div class="delivery-header">
                <h1>Delivery</h1>
                <!--<img src="/assets/img/delivery-icon-9.png" alt="Delivery Icon" class="delivery-logo">---->
            </div>

            @foreach($deliveries as $delivery)
            @endforeach
            `

            <div class="progress-bar-container">
                <div class="progress-bar" style="width: {{ $delivery->status }}%;"></div>
                <span class="progress-label">{{ $delivery->status }} </span>
            </div>

                <h3>Delivery ID : {{ $delivery->id }}</h3>
                <h3>Name : {{ $delivery->customer_name }}</h3>
                <h3>Address : {{ $delivery->address }}</h3>
                <h3>Delivery Date : {{ $delivery->delivery_date }}</h3>

            </div>
    </div>

</body>
</html>
