@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $employee->name }} Details</h1>

        <div class="card">
            <div class="card-body">
                <p><strong>Name:</strong> {{ $employee->name }}</p>
                <p><strong>Email:</strong> {{ $employee->email }}</p>
                <p><strong>Address:</strong> {{ $employee->adresse }}</p>
                <p><strong>Telephone:</strong> {{ $employee->telephone }}</p>
                <p><strong>Date of Birth:</strong> {{ $employee->date_de_naissance }}</p>

                <a href="{{ url('/employee') }}" class="btn btn-primary">Back to Employee List</a>
            </div>
        </div>
    </div>
@endsection