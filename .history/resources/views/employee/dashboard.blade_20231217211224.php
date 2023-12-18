@extends('layouts.app')

@section('content')
    
    <div class="container">
        </br>
        <h1>Employee Dashboard</h1>
        </br>
        </br>
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
                        <td><a href="{{ url('/employee/' . $employee->id . '/details') }}">View Employee Details</a></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No Employees found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Add other content as needed -->
    </div>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection
