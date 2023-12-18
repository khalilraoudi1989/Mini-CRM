@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif

                <!-- Link to go back to the company dashboard -->
                <p class="mt-3" style="margin-bottom : 10px;">
                    <a href="{{ route('admin.dashboard') }}">Go to Admin Dashboard</a>
                </p>

                <h1>Company Dashboard</h1>

                <div class="mb-3" style="height : 42px;margin-bottom : 15px;">
                    <a href="{{ route('company.create') }}" class="btn btn-primary">Add Company</a>
                </div>

                <form action="{{ route('company.index') }}" method="GET" class="mb-3" style="margin-bottom : 30px;">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search...">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>

                <div class="mb-3" style="height : 42px;margin-bottom : 15px;">
                    <a href="{{ route('company.index', ['sort' => 'name']) }}" class="btn btn-primary">Sort by Name</a>
                </div>

                <h2>List of Companies</h2>

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
                                <td>
                                    <a href="{{ route('company.edit', ['company' => $company->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('company.destroy', ['company' => $company->id]) }}" method="post" style="background-color: transparent;" onsubmit="return confirm('Are you sure you want to delete this company?');">
                                        @csrf
                                        @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">No companies found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection
