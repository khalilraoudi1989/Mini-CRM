@extends('layouts.app')

@section('content')
<div class="container">

    <!-- Link to go back to the admin dashboard -->
    <p  class="goto"  style="margin-bottom : 10px;">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Go to Admin Dashboard</a>
    </p>

    <h1>Invitations Dashboard</h1>

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

    <table class="table">
        <thead>
            <tr>
                <th>Email</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($invitations as $invitation)
                <tr>
                    <td>{{ $invitation->email }}</td>
                    <td>
                        <span class="{{ $invitation->confirmed ? 'text-success' : 'text-warning' }}">
                            {{ $invitation->confirmed ? 'Confirmée' : 'En attente' }}
                        </span>
                    </td>
                    <td>
                        @if (!$invitation->confirmed)
                            <form action="{{ route('invitation.cancel', ['invitation' => $invitation->id]) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to cancel this invitation?')">Annuler</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No invitations found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection
