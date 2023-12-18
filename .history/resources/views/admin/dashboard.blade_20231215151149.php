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
