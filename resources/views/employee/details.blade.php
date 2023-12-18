@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Link to go back to the admin dashboard -->
        <p class="goto" style="margin-bottom : 10px;">
            <a href="{{ route('employee.dashboard') }}">Go to Employee Dashboard</a>
        </p>
        <h1>{{ $employee->name }} Details</h1>

        <div class="card">
            <div class="card-body">
                <p><strong>Name:</strong> {{ $employee->name }}</p>
                <p><strong>Email:</strong> {{ $employee->email }}</p>
                <p><strong>Address:</strong> {{ $employee->address }}</p>
                <p><strong>Phone:</strong> {{ $employee->phone }}</p>
                <p><strong>Date of Birth:</strong> {{ $employee->date_of_birth }}</p>
            </div>
        </div>
    </div>
@endsection