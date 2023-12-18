<!-- resources/views/companies/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>List of Companies</h1>

        <ul>
            @foreach ($companies as $company)
                <li>{{ $company->name }}</li>
            @endforeach
        </ul>
    </div>
@endsection