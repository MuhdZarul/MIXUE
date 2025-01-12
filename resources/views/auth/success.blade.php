<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Successful</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="container">
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
            <a href="{{ route('login') }}" class="btn">Log In</a>
        </div>
    </div>
</body>

</html>
