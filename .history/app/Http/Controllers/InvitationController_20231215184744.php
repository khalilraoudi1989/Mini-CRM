<?php

// app/Http/Controllers/InvitationController.php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Mail\InvitationMail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    public function create()
    {
        $companies = Company::all();

        return view('invite-employee', compact('companies'));
    }

    public function send(Request $request)
    {
        // Ajoutez la logique pour générer un token unique et enregistrer l'invitation dans la base de données
        // Envoyez ensuite l'email avec le lien d'invitation

        $token = Str::uuid();

        // Exemple d'enregistrement de l'invitation
        Invitation::create([
            'email' => $request->input('email'),
            'token' => $token,
            'company_id' => $request->input('company_id'),
        ]);

        // Exemple d'envoi de l'email
        // ...

        session()->flash('success', 'L\'invitation a été envoyée avec succès.');

        return redirect()->route('invitation.create');
    }

}