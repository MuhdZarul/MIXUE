@extends('layout.layout')

@section('content')
    <h2>Delete Menu</h2>
        <form method="POST" action="{{ url('/admin/delete-menu') }}">
            @csrf
            <label>Select Menu:</label>
            <select name="menu_id" required>
                @foreach($menus as $menu)
                <option value="{{ $menu->id }}">{{ $menu->Food_Name }}</option>
                @endforeach
            </select>
            <br><button type="submit">Delete Menu</button>
        </form>
@endsection
