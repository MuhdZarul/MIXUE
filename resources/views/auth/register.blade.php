<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ff0000;
        }

        .container {
            max-width: 500px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #e4002b;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #bf0023;
        }

        input {
            width: 95%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .checkbox {
            display: flex;
            align-items: center;
        }

        .checkbox input {
            width: auto;
            margin-right: 10px;
        }

        .terms {
            font-size: 14px;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>Register</h2>
        </div>

        @if (session('success'))
            <div style="color: green;">{{ session('success') }}</div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf

            <label for="name">Full Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required autofocus
                autocomplete="name">

            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required
                autocomplete="email">

            <label for="phone_no">Phone Number</label>
            <input type="text" name="phone_no" id="phone_no" value="{{ old('phone_no') }}" required>

            <label for="password">Password</label>
            <input type="password" name="password" id="password" required autocomplete="new-password">

            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required
                autocomplete="new-password">

            <div class="checkbox">
                <input type="checkbox" name="terms" id="terms" required>
                <label for="terms">
                    I agree to the Terms & Conditions and
                    Privacy Policy
                </label>
                {{-- <label for="terms">
                    I agree to the <a href="{{ route('terms.show') }}">Terms & Conditions</a> and
                    <a href="{{ route('policy.show') }}">Privacy Policy</a>
                </label> --}}
            </div>

            <button type="submit" class="btn">Register</button>
        </form>

        <div class="mt-4 text-center">
            <a href="{{ route('login') }}" class="underline text-sm text-gray-600 hover:text-gray-900">
                Already registered? Log in.
            </a>
        </div>
    </div>
</body>

</html>
