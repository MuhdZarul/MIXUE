<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Admin Login</title>
    <style>
        body {
            margin: 10%;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 70vh;
            background-color: #ff0000;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
        }

        .left-side {
            width: 50%;
            height: 100%;
            background: url('{{ asset('images/logo.png') }}') no-repeat center center;
            background-size: cover;
        }

        .right-side {
            width: 50%;
            background-color: #ff0000;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-box {
            background: #fff;
            border-radius: 10px;
            padding: 40px;
            max-width: 500px;
            width: 100%;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .login-box h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .input-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .login-btn {
            display: block;
            width: 100%;
            background: #ff0000;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
        }

        .login-btn:hover {
            background: #cc0000;
        }

        .register-link {
            margin-top: 10px;
            text-align: center;
        }

        .register-link a {
            color: #ff0000;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Left side with logo background -->
        <div class="left-side"></div>

        <!-- Right side with the form -->
        <div class="right-side">
            <div class="login-box">
                <h1>LOGIN</h1>
                <form action="{{ route('adminlogin.post') }}" method="POST">
                    @csrf
                    <div class="input-group">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" name="email" placeholder="username@gmail.com" required>
                    </div>
                    <div class="input-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Password" required>
                    </div>
                    <button type="submit" class="login-btn">LOGIN</button>
                </form>
                <div class="register-link">
                    Don’t have an account yet? <a href="{{ route('register') }}">Register for free.</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
