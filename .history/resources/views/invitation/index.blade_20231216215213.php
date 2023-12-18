<!-- resources/views/invitations/index.blade.php -->

<ul>
    @foreach ($invitations as $invitation)
        <li>
            <strong>Email:</strong> {{ $invitation->email }} -
            <strong>Status:</strong> {{ $invitation->confirmed ? 'Confirmée' : 'En attente' }}
            <form action="{{ route('invitation.cancel', ['invitation' => $invitation->id]) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-primary">Annuler</button>
            </form>
        </li>
    @endforeach
</ul>