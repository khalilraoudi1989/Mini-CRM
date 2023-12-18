@extends('layouts.app')

@section('content')
    
    <div class="container">
        </br>
        <h1>Company Dashboard</h1>
        </br>
        <a href="{{ route('e.create') }}" class="btn btn-primary">Add Company</a>
        </br>
        </br>
        <form action="{{ route('company.index') }}" method="GET">
            <input type="text" name="search" placeholder="Rechercher...">
            <button type="submit" class="btn btn-primary">Rechercher</button>
        </form>
        </br>
        </br>
        <a href="{{ route('company.index', ['sort' => 'name']) }}" class="btn btn-primary">Trier par nom</a>
        </br>
        </br>
        <h2>List of Companies</h2>
        </br>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($companies as $company)
                    <tr>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->description }}</td>
                        <td><a href="{{ route('company.edit', ['company' => $company->id]) }}">Edit</a></td>
                        <td><form action="{{ route('company.destroy', ['company' => $company->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No companies found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>


        <!-- Add other content as needed -->
    </div>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection
