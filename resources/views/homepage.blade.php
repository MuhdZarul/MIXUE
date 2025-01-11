<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Sweet Treats</title>
    <style>
        body {
            font-family: 'Comic Sans MS', cursive, sans-serif;
            background-color: #ffefd5; /* Light peach for a soft background */
            color: #5a2d0c; /* Chocolate brown for text */
            text-align: center;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #ffcccb; /* Light pink for header */
            padding: 20px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        header h1 {
            margin: 0;
            font-size: 2.5em;
            color: #ff69b4; /* Hot pink for the title */
        }
        .container {
            padding: 40px;
        }
        .ice-cream-image {
            width: 150px;
            margin: 20px auto;
            display: block;
        }
        .description {
            font-size: 1.2em;
            margin: 20px 0;
        }
        .button-container {
            margin-top: 30px;
        }
        button {
            font-size: 18px;
            padding: 15px 30px;
            background-color: #ff69b4; /* Hot pink */
            color: white;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            transition: transform 0.2s, background-color 0.3s;
        }
        button:hover {
            background-color: #ff1493; /* Deeper pink on hover */
            transform: scale(1.1);
        }
        footer {
            margin-top: 50px;
            font-size: 0.9em;
            color: #8b4513; /* Saddle brown for footer */
        }
    </style>
</head>
<body>
    <header>
        <h1>Sweet Treats Ice Cream Shop</h1>
    </header>
    <div class="container">
        <img src="https://cdn-icons-png.flaticon.com/512/139/139899.png"
             alt="Ice Cream Cone"
             class="ice-cream-image">
        <p class="description">Welcome to Sweet Treats! 🍦 We serve smiles, scoops, and satisfaction. Manage your deliveries below!</p>
        <div class="button-container">
            <a href="{{ route('deliveries.index') }}">
                <button>Go to Delivery Page</button>
            </a>
        </div>
    </div>
    <footer>
        © {{ date('Y') }} Sweet Treats. Made with ❤️ and ice cream!
    </footer>
</body>
</html>
