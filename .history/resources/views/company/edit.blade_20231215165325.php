<!-- resources/views/companies/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Company</h1>

        <form action="{{ route('company.update', ['company' => $company->id]) }}" method="post">
            @csrf
            @method('PATCH')

            <label for="name">Company Name:</label>
            <input type="text" name="name" value="{{ $company->name }}" required>

            <label for="description">Company Description:</label>
            <textarea name="description" rows="4" required>{{ $company->description }}</textarea>

            <!-- Add other fields as needed -->

            <button type="submit">Update</button>
        </form>
    </div>
@endsection