<?php

// app/Http/Controllers/InvitationController.php

namespace App\Http\Controllers;

use App\Models\Invitation;
use Illuminate\Http\Request;

class InvitationController extends Controller
{
    public function accept($token)
    {
        $invitation = Invitation::where('token', $token)->first();

        if (!$invitation) {
            return redirect()->route('login')->with('error', 'L\'invitation est invalide.');
        }

        // Implémentez la logique pour ajouter l'utilisateur à la société
        // Vous pouvez utiliser la relation dans le modèle Company pour ajouter l'utilisateur
        // ...

        // Supprimez l'invitation après utilisation
        $invitation->delete();

        return redirect()->route('dashboard')->with('success', 'Vous avez rejoint la société avec succès.');
    }
}