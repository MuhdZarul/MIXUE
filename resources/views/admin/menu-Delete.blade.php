@extends('layout.layout')

@section('content')
    <h2>Delete Menu</h2>
    <div class="container">
        <form method="POST" action="" id="deleteForm">
            @csrf
            @method('DELETE')
            
            <div class="form-group">
                <label for="menuSelect">Select Menu to Delete:</label>
                <select name="id" id="menuSelect">
                    @foreach ($menus as $menu)
                        <option value="{{ $menu->id }}">{{ $menu->Food_Name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="delete-button">Delete Menu</button>
        </form>
    </div>

    <script>
        // Update the form action dynamically when a menu is selected
        document.getElementById('deleteForm').addEventListener('submit', function(event) {
            var selectedId = document.getElementById('menuSelect').value;
            this.action = '{{ route("menu.destroy", ":id") }}'.replace(':id', selectedId);
        });
    </script>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

        .container {
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            font-size: 14px;
            color: #333;
            margin-bottom: 5px;
        }

        select {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            width: 100%;
        }

        button.delete-button {
            padding: 10px 20px;
            background-color: #f44336;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }

        button.delete-button:hover {
            background-color: #d32f2f;
        }

        .error {
            color: red;
            font-size: 12px;
        }
    </style>
@endsection
