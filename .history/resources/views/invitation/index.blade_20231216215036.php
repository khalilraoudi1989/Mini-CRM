<!-- resources/views/invitations/index.blade.php -->

<ul>
    @foreach ($invitations as $invitation)
        <li>
            <strong>Email:</strong> {{ $invitation->email }} -
            <strong>Status:</strong> {{ $invitation->confirmed ? 'Confirmée' : 'En attente' }}
            <a href="{{ route('admin.invitations.show', ['invitation' => $invitation->id]) }}">Détails</a>
            <form action="{{ route('admin.invitations.cancel', ['invitation' => $invitation->id]) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit">Annuler</button>
            </form>
        </li>
    @endforeach
</ul>