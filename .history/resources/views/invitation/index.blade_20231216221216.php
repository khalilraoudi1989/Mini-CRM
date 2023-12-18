blade
Copy code
<table>
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
                <td>{{ $invitation->confirmed ? 'Confirmée' : 'En attente' }}</td>
                <td>
                    <a href="{{ route('admin.invitations.show', ['invitation' => $invitation->id]) }}">Détails</a>
                    <form action="{{ route('admin.invitations.cancel', ['invitation' => $invitation->id]) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" onclick="return confirm('Are you sure you want to cancel this invitation?')">Annuler</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3">No invitations found.</td>
            </tr>
        @endforelse
    </tbody>
</table>