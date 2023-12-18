@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Company Details</h1>

        <div class="card">
            <div class="card-body">
                <p><strong>Company Name:</strong> {{ $company->name }}</p>
                <p><strong>Description:</strong> {{ $company->email }}</p>
                <p><strong>Created At:</strong> {{ $company->created_at }}</p>

                <a href="{{ url('/employee/dashboard') }}" class="btn btn-primary">Back to Employee List</a>
            </div>
        </div>
    </div>
@endsection