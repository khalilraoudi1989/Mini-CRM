<!-- Dans resources/views/employee/profile.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Mon Profil</h1>

        <form method="POST" action="{{ route('employee.update-profile') }}">
            @csrf
            @method('PATCH')

            <!-- Afficher les informations actuelles de l'employé -->
            <p><strong>Name:</strong> {{ $employee->name }}</p>
            <p><strong>Email:</strong> {{ $employee->email }}</p>
            <p><strong>Address:</strong> {{ $employee->address }}</p>
            <p><strong>Phone:</strong> {{ $employee->phone }}</p>
            <p><strong>Date of Birth:</strong> {{ $employee->date_of_birth }}</p>

            <label for="address">New Address:</label>
            <input type="text" name="address" value="{{ old('address') }}" required>

            <label for="phone">New Phone:</label>
            <input type="text" name="phone" value="{{ old('phone') }}" required>

            <button type="submit">Enregistrer les modifications</button>
        </form>
    </div>
@endsection