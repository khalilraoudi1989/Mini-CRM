<?php

// app/Http/Controllers/InvitationController.php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InvitationController extends Controller
{

    

    public function index()
    {
        $invitations = Invitation::all();
        return view('invitation.index', compact('invitations'));
    }

    public function cancel(Invitation $invitation)
    {
        // Annuler l'invitation
        $invitation->delete();
        
        return redirect()->route('invitation.index')->with('success', 'Invitation annulée avec succès');
    }

    public function accept($token)
    {
        // Recherche de l'invitation correspondante
        $invitation = Invitation::where('token', $token)->first();

        // Vérifier si l'invitation existe et n'a pas déjà été utilisée
        if (!$invitation || $invitation->is_used) {
            abort(404); // Ou redirigez vers une page d'erreur
        }

        // Marquer l'invitation comme utilisée
        $invitation->update(['is_used' => true]);

        // Ajouter l'employé à la société spécifiée
        Employee::create([
            'email' => $invitation->email,
            'company_id' => $invitation->company_id,
            // Ajoutez d'autres champs si nécessaire
        ]);

        // Supprimer l'invitation après utilisation
        $invitation->delete();

        session()->flash('success', 'Bienvenue ! Vous avez rejoint la société avec succès.');

        // Vous pouvez rediriger l'utilisateur vers une page spécifique
        return redirect('/employee/dashboard');
    }

    public function create()
    {
        $companies = Company::all();

        return view('invite-employee', compact('companies'));
    }

    public function send(Request $request)
    {
        // Générer un token unique
        $token = Str::uuid();

        // Enregistrement de l'invitation dans la base de données
        $invitation = Invitation::create([
            'email' => $request->input('email'),
            'token' => $token,
            'company_id' => $request->input('company_id'),
        ]);

        // Construire le lien d'invitation
        $invitationLink = route('invitation.accept', ['token' => $token]);

        // Envoyer l'email d'invitation
        Mail::to($request->input('email'))->send(new InvitationMail($invitationLink));

        session()->flash('success', 'L\'invitation a été envoyée avec succès.');

        return redirect()->route('invitation.create');
    }

}