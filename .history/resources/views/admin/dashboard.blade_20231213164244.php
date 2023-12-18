@extends('layouts.app')

@section('content')
    
    <div class="container">
        <h1>Admin Dashboard</h1>
        <p>Welcome to the admin dashboard!</p>

        <h2>List of Administrators</h2>
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

        <a href="{{ route('admin.create') }}" class="btn btn-primary">Add Administrator</a>

        <!-- Add other content as needed -->
    </div>
    <!-- Include the CSS file -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection
