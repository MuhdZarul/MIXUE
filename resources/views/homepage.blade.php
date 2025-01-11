@extends('layout.layout')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mixue</title>
    <style>
        .hero-section {
                position: relative;
                width: 100%;
                height: 100vh; /* Full viewport height */ /* Adjust height as needed */
                background: url('assets/img/mixue_home.png') no-repeat center center;
                background-size: cover;
            }

        .search-container {
            position: absolute;
            top: 50%; /* Vertically center */
            left: 50%; /* Horizontally center */
            transform: translate(-50%, -50%);
            width: 50%; /* Adjust width of search bar container */
            text-align: center;
        }

        .search-container input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 2px solid #ddd;
            border-radius: 5px;
        }

    </style>
</head>
<body>
    <div class="hero-section">
        <div class="search-container">
            <input type="text" placeholder="Search..." />
        </div>
    </div>

</body>
</html>
@endsection
