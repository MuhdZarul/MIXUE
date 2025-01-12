@extends('layout.layout')
@section('content')

    <h2>Add Menu</h2>
        <form method="POST" action="{{ url('/admin/add-menu') }}">
            <!-- @csrf -->
            <label>Food Name:</label>
            <input type="text" name="Food_Name" required><br>
            <label>Description:</label>
            <textarea name="Description" required></textarea><br>
            <label>Price:</label>
            <input type="number" step="0.01" name="Price" required><br>
            <label>Image Path:</label>
            <input type="text" name="image" required><br>
            <button type="submit">Add Menu</button>
        </form>
@endsection
