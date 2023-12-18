@extends('layouts.app')

@section('content')
    
    <div class="container">
        </br>
        <h1>Company Dashboard</h1>
        </br>
        <a href="{{ route('company.create') }}" class="btn btn-primary">Add Company</a>
        </br>
        <!-- Ajouter un lien vers la gestion des sociétés -->
        <a href="{{ route('company.index') }}" class="btn btn-primary">Manage Companies</a>
        </br>
        </br>
        <h2>List of Companies</h2>
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
