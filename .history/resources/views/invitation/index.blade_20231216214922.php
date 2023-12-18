<!-- resources/views/invitations/index.blade.php -->

@foreach ($invitations as $invitation)
    <p>Email: {{ $invitation->email }} - Status: {{ $invitation->confirmed ? 'Confirmée' : 'En attente' }}
        <a href="{{ route('invitation.cancel', ['invitation' => $invitation->id]) }}">Annuler</a>
    </p>
@endforeach