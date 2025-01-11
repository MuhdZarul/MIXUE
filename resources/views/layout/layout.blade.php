<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mixue - Home</title>
    <!-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> Add your custom CSS here -->
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #fff;
        }
        header {
            background-color: #e60000;
            color: white;
            padding: 10px 20px;
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
    </style>
</head>
<body>
    <header>
        <div>
            <img src="assets/img/mixue_logo.png" alt="Mixue Logo" class="logo"> <!-- Replace with your logo path -->
        </div>
        <nav>
            <ul>
                <li><a href="/">HOME</a></li>
                <li><a href="/menu">MENU</a></li>
                <li><a href="/deliveries">DELIVERY</a></li>
                <li><a href="/admin">ADMIN</a></li>
                <li><a href="#"><img src="assets/img/shopping-cart.png" alt="Cart" style="height: 20px;"></a></li>
                <li><a href="#"><img src="assets/img/user.png" alt="Profile" style="height: 20px;"></a></li>
            </ul>
        </nav>
    </header>

@yield('content')
    <footer>
        <div class="footer-content">
            <!-- Contact Section -->
            <div class="footer-section">
                <h4>Contact Us</h4>
                <p>Email: support@mixue.com</p>
                <p>Phone: +6012-3456789</p>
                <p>Address: Mixue HQ, Ice Cream Street, Malaysia</p>
            </div>

            <!-- Social Media Links -->
            <div class="footer-section">
                <h4>Follow Us</h4>
                <a href="#">Facebook</a><br>
                <a href="#">Instagram</a><br>
                <a href="#">Twitter</a>
            </div>

            <!-- Quick Links -->
            <div class="footer-section">
                <h4>Quick Links</h4>
                <a href="#">About Us</a><br>
                <a href="#">Privacy Policy</a><br>
                <a href="#">Terms of Service</a>
            </div>
        </div>
        <div class="copyright">
            &copy; 2025 Mixue. All Rights Reserved.
        </div>
    </footer>
</body>
</html>
