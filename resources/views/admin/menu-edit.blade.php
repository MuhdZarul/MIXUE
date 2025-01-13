@extends('layout.layout')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Menu to Edit</title>
    <style>
        /* Styling (same as before for visual consistency) */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        h2 {
            color: #333;
            text-align: center;
            margin-top: 30px;
            font-size: 24px;
        }

        form {
            margin: 0 auto;
            margin-top: 20px;
            max-width: 400px;
            padding: 20px;
            background: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        label {
            font-size: 16px;
            color: #555;
            display: block;
            margin-bottom: 10px;
        }

        select {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        select:focus {
            border-color: #e60000;
            outline: none;
            box-shadow: 0 0 5px rgba(230, 0, 0, 0.5);
        }

        button {
            width: 100%;
            padding: 10px 15px;
            font-size: 16px;
            background-color: #e60000;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: rgb(226, 152, 152);
        }
    </style>
</head>
<body>
    <h2>Select Menu to Edit</h2>

    <form method="GET" id="menuForm">
        @csrf
        <label>Select a Menu to Edit:</label>
        <select name="menu_id" id="menuSelect">
            <option value="">-- Select Menu --</option>
            @foreach ($menus as $menu)
                <option value="{{ $menu->id }}">{{ $menu->Food_Name }}</option>
            @endforeach
        </select>
        <button type="submit" disabled>Select Menu</button>
    </form>

    <script>
        // JavaScript to handle dynamic action and enable button
        const menuForm = document.getElementById('menuForm');
        const menuSelect = document.getElementById('menuSelect');
        const submitButton = menuForm.querySelector('button');

        menuSelect.addEventListener('change', function () {
            const selectedId = menuSelect.value;
            if (selectedId) {
                menuForm.action = `{{ url('/menu/update') }}/${selectedId}`;
                submitButton.disabled = false;
            } else {
                menuForm.action = '';
                submitButton.disabled = true;
            }
        });
    </script>
</body>
</html>
@endsection
