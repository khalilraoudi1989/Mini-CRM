<!-- Dans resources/views/admin/history.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">

        <!-- Link to go back to the admin dashboard -->
        <p class="mt-3" style="margin-bottom : 10px;">
            <a href="{{ route('admin.dashboard') }}">Go to Admin Dashboard</a>
        </p>

        <h1>Action History</h1>

        <ul>
            @foreach($historyEntries as $entry)
                <li>{{ $entry->description }}</li>
            @endforeach
        </ul>

        {{ $historyEntries->links() }}
    </div>
@endsection