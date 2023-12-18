@extends('layouts.app')

@section('content')

<div class="container">
<!-- In resources/views/registration/form.blade.php -->
    <form method="POST" action="{{ url('/invitation/accept/' . $invitation->token) }}">
        @csrf
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="form-group">
            <!-- Name field -->
            <label for="name">Name:</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
        </div>

        <div class="form-group">
            <!-- Address field -->
            <label for="address">Address:</label>
            <input type="text" name="address" value="{{ old('address') }}" class="form-control" required>
        </div>

        <div class="form-group">
            <!-- Telephone field -->
            <label for="phone">Telephone:</label>
            <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" required>
        </div>

        <div class="form-group">
            <!-- Date of Birth field -->
            <label for="date_of_birth">Date of Birth:</label>
            <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Complete Registration</button>
    </form>
</div>
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection