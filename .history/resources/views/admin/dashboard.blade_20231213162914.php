@extends('layouts.app')

@section('content')
    
    <div class="container">
        <h1>Admin Dashboard</h1>
        <p>Welcome to the admin dashboard!</p>

        <h2>List of Administrators</h2>
        <ul>
            @foreach ($administrators as $administrator)
                <li>{{ $administrator->name }} - {{ $administrator->email }}</li>
            @endforeach
        </ul>

        <!-- Add other content as needed -->
    </div>

@endsection