<!-- resources/views/companie/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">

        <!-- Link to go back to the company dashboard -->
        <p class="mt-3" style="margin-bottom : 10px;">
            <a href="{{ route('company.index') }}">Go to Company Dashboard</a>
        </p>

        <h1>Create Company</h1>

        <form method="post" action="{{ route('company.store') }}">
            @csrf

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" class="form-control" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Create Company</button>
        </form>
    </div>
@endsection