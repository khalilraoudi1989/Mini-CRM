@extends('layouts.app')

@section('content')
    
    <div class="container">
        </br>
        <h1>Company Dashboard</h1>
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
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($companies as $company)
                    <tr>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->description }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2">No companies found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>


        <!-- Add other content as needed -->
    </div>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection
