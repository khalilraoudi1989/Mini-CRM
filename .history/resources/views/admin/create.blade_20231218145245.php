<!-- resources/views/admin/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Administrator</h1>

        <form method="post" action="{{ route('admin.store') }}">
            @csrf

            <fieldset>
                <legend>Administrator Information</legend>

                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </fieldset>

            <button type="submit" class="btn btn-primary">Create Administrator</button>
        </form>
    </div>
@endsection