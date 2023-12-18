<!-- create_admin.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ url('/admin/create_admin') }}" method="post">
            @csrf
            <label for="name">Nom:</label>
            <input type="text" name="name" required>

            <label for="email">Email:</label>
            <input type="email" name="email" required>

            <label for="password">Mot de passe:</label>
            <input type="password" name="password" required>

            <button type="submit">Créer Administrateur</button>
        </form>
    </div>
@endsection