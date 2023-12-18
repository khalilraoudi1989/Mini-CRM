@extends('layouts.app')

@section('content')
    
    <div class="container">
        </br>
        <h1>Employee Dashboard</h1>
        </br>
        <a href="{{ route('employee.create') }}" class="btn btn-primary">Add Employee</a>
        </br>
        </br>
        <form action="{{ route('employee.index') }}" method="GET">
            <input type="text" name="search" placeholder="Rechercher...">
            <button type="submit" class="btn btn-primary">Rechercher</button>
        </form>
        </br>
        </br>
        <a href="{{ route('employee.index', ['sort' => 'name']) }}" class="btn btn-primary">Trier par nom</a>
        </br>
        </br>
        <h2>List of employees</h2>
        </br>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($employees as $employee)
                    <tr>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->email }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2">No Employees found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>


        <!-- Add other content as needed -->
    </div>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection
