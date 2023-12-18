@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Admin Dashboard</h1>
        <p>Welcome, {{ Auth::user()->name }}!</p>

        <div class="dashboard-actions">
            <a href="{{ route('admin.create') }}" class="btn btn-primary">Add Administrator</a>
            <a href="{{ route('company.index') }}" class="btn btn-primary">Manage Companies</a>
            <a href="{{ route('employee.index') }}" class="btn btn-primary">Manage Employees</a>
            <a href="{{ route('invitation.index') }}" class="btn btn-primary">Manage Invitations</a>
            <a href="{{ route('invitation.create') }}" class="btn btn-primary">Send an invitation</a>
            <a href="{{ route('admin.history') }}" class="btn btn-primary">View Stock History</a>
        </div>

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
    </div>
@endsection