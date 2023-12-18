<!-- Dans resources/views/admin/history.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Historique des Actions</h1>

        <ul>
            @foreach($historyEntries as $entry)
                <li>{{ $entry->action }} - {{ $entry->description }} ({{ $entry->created_at }})</li>
            @endforeach
        </ul>

        {{ $historyEntries->links() }}
    </div>
@endsection