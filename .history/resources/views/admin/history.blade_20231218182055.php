<!-- Dans resources/views/admin/history.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Action History</h1>

        <ul>
            @foreach($historyEntries as $entry)
                <li>{{ $entry->description }}</li>
            @endforeach
        </ul>

        {{ $historyEntries->links() }}
    </div>
@endsection