@extends('layout.layout')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href='assets/css/style.css'>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Mixue Menu</h1>
        </div>
        <div class="menu-grid">
            @foreach ($menus as $menu)
                <div class="menu-item">
                    <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->Food_Name }}" class="menu-image">
                    <h3>{{ $menu->Food_Name }}</h3>
                    <p>{{ $menu->Description }}</p>
                    <span class="price">RM {{ number_format($menu->Price, 2) }}</span>


                    <!--button class="add-to-cart">+</button>-->
                    <!-- Add to Cart Form -->
                        <form action="{{ route('cart.add') }}" method="POST">
                        <!--<form action="/cart/add" method="POST">-->
                        @csrf
                        <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                        <input type="hidden" name="quantity" value="1"> <!-- Default quantity -->
                        <button type="submit" class="add-to-cart">+</button>
                    </form>

                </div>
            @endforeach
        </div>


    </div>
</body>
</html>

@endsection
