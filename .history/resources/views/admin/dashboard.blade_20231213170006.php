@extends('layouts.app')

@section('content')
    
    <div class="container">
        <h1>Admin Dashboard</h1>

        <a href="{{ route('admin.create') }}" class="btn btn-primary">Add Administrator</a>

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


        <!-- Add other content as needed -->
    </div>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection
