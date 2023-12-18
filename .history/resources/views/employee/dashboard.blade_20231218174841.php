@extends('layouts.app')

@section('content')
    
    <div class="container">

        </br>
        <h1>Employee Dashboard</h1>
        <h2>List of employees</h2>
        </br>
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
                        <td><a href="{{ url('/company/' . $employee->company_id.'/details') }}">View Company Details</a></td>
                        @if(Auth::user()->id === $employee->id)
                        <td><a href="{{ url('/employee/profile') }}">View My Profile</a></td>
                        @else
                        <td><a href="{{ url('/employee/' . $employee->id . '/details') }}">View Employee Details</a></td>
                        @endif
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No Employees found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection
