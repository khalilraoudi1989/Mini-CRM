@extends('layouts.app')

@section('content')
    
    <div class="container">
        </br>
        <h1>Admin Dashboard</h1>
        <!-- Contenu spécifique au tableau de bord de l'administrateur -->
        <p>Bienvenue, {{ Auth::user()->name }}!</p>
        </br>
        <a href="{{ route('admin.create') }}" class="btn btn-primary">Add Administrator</a>
        </br>
        </br>
        <!-- Ajouter un lien vers la gestion des sociétés -->
        <a href="{{ route('company.index') }}" class="btn btn-primary">Manage Companies</a>
        </br>
        </br>
        <!-- Ajouter un lien vers la gestion des employees -->
        <a href="{{ route('employee.dashboard') }}" class="btn btn-primary">Manage Employees</a>
        </br>
        </br>
        <a href="{{ route('invitation.create') }}"  class="btn btn-primary">Envoyer une invitation</a>
        </br>
        </br>
        <h2>List of Administrators</h2>
        </br>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($administrators as $administrator)
                    <tr>
                        <td>{{ $administrator->name }}</td>
                        <td>{{ $administrator->email }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2">No administrators found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>


        <!-- Add other content as needed -->
    </div>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection
