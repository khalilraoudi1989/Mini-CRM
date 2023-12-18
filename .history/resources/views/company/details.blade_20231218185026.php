@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Link to go back to the admin dashboard -->
        <p class="goto" style="margin-bottom : 10px;">
            <a href="{{ route('employee.dashboard') }}">Go to Employee Dashboard</a>
        </p>
        <h1>Company Details</h1>

        <div class="card">
            <div class="card-body">
                <p><strong>Company Name:</strong> {{ $company->name }}</p>
                <p><strong>Description:</strong> {{ $company->email }}</p>
                <p><strong>Created At:</strong> {{ $company->created_at }}</p>
            </div>
        </div>
    </div>
@endsection