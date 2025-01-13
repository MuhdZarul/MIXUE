@extends('layout.layout')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Menu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        h1 {
            color: #333;
            text-align: center;
            margin-top: 30px;
            font-size: 28px;
        }

        form {
            margin: 20px auto;
            max-width: 500px;
            padding: 20px;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        label {
            font-size: 16px;
            color: #555;
            display: block;
            margin-top: 15px;
        }

        input[type="text"], 
        input[type="number"], 
        textarea, 
        input[type="file"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 8px;
        }

        textarea {
            height: 100px;
            resize: vertical;
        }

        input[type="text"]:focus, 
        input[type="number"]:focus, 
        textarea:focus, 
        input[type="file"]:focus {
            border-color: #e60000;
            outline: none;
            box-shadow: 0 0 5px rgba(230, 0, 0, 0.5);
        }

        button {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            background-color: #e60000;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: rgb(226, 152, 152);
        }
    </style>
</head>
<body>
    <h1>Edit Menu</h1>

    <form method="POST" action="{{ route('menu.update', $menu->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- Use PUT method for updating data -->

        <label for="Food_Name">Food Name:</label>
        <input type="text" id="Food_Name" name="Food_Name" value="{{ old('Food_Name', $menu->Food_Name) }}" placeholder="Enter food name" required>

        <label for="Description">Description:</label>
        <textarea id="Description" name="Description" placeholder="Enter description" required>{{ old('Description', $menu->Description) }}</textarea>

        <label for="Price">Price:</label>
        <input type="number" id="Price" name="Price" value="{{ old('Price', $menu->Price) }}" step="0.01" placeholder="Enter price" required>

        <label for="image">New Image (optional):</label>
        <input type="file" id="image" name="image" accept="image/*">

        <button type="submit">Update Menu</button>
    </form>
</body>
</html>
@endsection
