<!-- resources/views/employee/dashboard.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Employee Dashboard</h1>
    <h2>List of Employees</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($employees as $employee)
                <tr>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>
                        <a href="{{ url('/company/' . $employee->company_id.'/details') }}" class="btn btn-info">View Company Details</a>
                    </td>
                    <td>
                        @if(Auth::user()->id === $employee->id)
                            <a href="{{ url('/employee/profile') }}" class="btn btn-primary">View My Profile</a>
                        @else
                            <a href="{{ url('/employee/' . $employee->id . '/details') }}" class="btn btn-success">View Employee Details</a>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No Employees found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
<link rel="stylesheet" href="{{ asset('css/employee-dashboard.css') }}">
@endsection
