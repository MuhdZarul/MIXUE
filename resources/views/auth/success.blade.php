<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Successful</title>
    @vite('resources/css/app.css')
    <style>
        body {
            background-color: #f5f5f5;
            font-family: 'Arial', sans-serif;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 40px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .header h2 {
            font-size: 24px;
            color: #333;
            font-weight: bold;
        }

        .message {
            background-color: #e0f9e0;
            color: #4caf50;
            padding: 15px;
            border-radius: 5px;
            font-size: 16px;
            margin-top: 20px;
        }

        .body p {
            margin-top: 20px;
            font-size: 16px;
            color: #666;
        }

        .actions a {
            display: inline-block;
            background-color: #4caf50;
            color: white;
            padding: 12px 24px;
            border-radius: 50px;
            text-decoration: none;
            font-size: 16px;
            margin: 10px;
            transition: background-color 0.3s ease;
        }

        .actions a:hover {
            background-color: #73d876;
        }

        .icon img {
            width: 80px;
            height: 80px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="icon">
            <!-- Use the success image from the public/images directory -->
            <img src="{{ asset('images/success.png') }}" alt="Success Icon">
        </div>
        <div class="header">
            <h2>Congratulations!</h2>
        </div>
        <div class="message">
            <p>You have successfully registered.</p>
        </div>
        <div class="body">
            <p>Thank you for registering. You can now log in to your account.</p>
        </div>
        <div class="actions">
            <a href="{{ route('login') }}">Log In</a>
            <a href="{{ route('dashboard') }}">Profile</a>
            {{-- <a href="{{ route('menu.index') }}">Menu</a> --}}
        </div>
    </div>
</body>

</html>


{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Successful</title>
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
{{-- @vite('resources/css/app.css')
</head> --}}
{{--
<body>
    <div class="container mx-auto max-w-md p-8">
        <div class="header text-center">
            <h2 class="text-3xl font-bold">Congratulations!</h2>
        </div>
        <div class="message mt-8 p-4 bg-green-100 text-green-600 rounded-lg">
            <p>You have successfully registered.</p>
        </div>
        <div class="body mt-6 text-center">
            <p>Thank you for registering. You can now log in to your account.</p>
        </div>
        <div class="actions mt-8">
            <a href="{{ route('login') }}"
                class="btn bg-blue-500 text-white px-6 py-3 rounded-full text-lg block mx-auto">Log In</a>
            <a href="{{ route('dashboard') }}"
                class="btn bg-blue-500 text-white px-6 py-3 rounded-full text-lg block mx-auto">Dashboard</a>
            <a href="{{ route('menu.index') }}"
                class="btn bg-blue-500 text-white px-6 py-3 rounded-full text-lg block mx-auto">Menu</a>
        </div>
    </div>
</body>

</html> --}}
