<!-- Dans resources/views/employee/profile.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Mon Profil</h1>

        <form method="POST" action="{{ route('employee.update-profile') }}">
            @csrf
            @method('PATCH')

            <p><strong>Name:</strong> {{ $employee->name }}</p>
            <p><strong>Email:</strong> {{ $employee->email }}</p>
            <p><strong>Address:</strong> {{ $employee->address }}</p>
            <p><strong>Phone:</strong> {{ $employee->phone }}</p>
            <p><strong>Date of Birth:</strong> {{ $employee->date_of_birth }}</p>

            <label for="name">New Name:</label>
            <input type="text" name="name" value="{{ old('name') }}" >

            <label for="email">New Address:</label>
            <input type="mail" name="email" value="{{ old('email') }}" >

            <label for="address">New Address:</label>
            <input type="text" name="address" value="{{ old('address') }}" >

            <label for="phone">New Phone:</label>
            <input type="text" name="phone" value="{{ old('phone') }}" required>

            <button type="submit">Enregistrer les modifications</button>
        </form>
    </div>
@endsection