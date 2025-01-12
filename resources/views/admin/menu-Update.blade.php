@extends('layout.layout')

@section('content')
<h2>Update Menu</h2>
    <form method="POST" action="{{ url('/admin/update-menu') }}">
        @csrf
        <label>Select Menu:</label>
        <select name="menu_id" required>
            @foreach($menus as $menu)
            <option value="{{ $menu->id }}">{{ $menu->Food_Name }}</option>
            @endforeach
        </select>
        <br>
        <label>Attribute to Update:</label>
        <select name="attribute" required>
            <option value="Food_Name">Food Name</option>
            <option value="Description">Description</option>
            <option value="Price">Price</option>
            <option value="image">Image Path</option>
        </select>
        <br>
        <label>New Value:</label>
        <input type="text" name="new_value" required><br>
        <button type="submit">Update Menu</button>
    </form>
@endsection
