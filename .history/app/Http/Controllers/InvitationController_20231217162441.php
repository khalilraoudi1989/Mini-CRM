<?php

// app/Http/Controllers/InvitationController.php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Mail\InvitationMail;
use App\Models\Company;
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

    public function showRegistrationForm($token)
    {
        // Retrieve invitation by token
        $invitation = Invitation::where('token', $token)->first();

        // Check if the invitation is valid
        if ($invitation && !$invitation->is_used) {
                    // Create a new user with the provided information
        $user = User::create([
            'email' => $invitation->email,
            'company_id' => $invitation->companyId, // Replace with the actual company_id value
        ]);
            return view('registration.form', compact('invitation'));
        } else {
            // Handle invalid or used invitation
            return redirect('/invalid-invitation');
        }
    }

    public function processRegistration(Request $request, $token)
    {
        // Validate the form data
        $request->validate([
            'password' => 'required|min:6',
            // Add validation rules for other profile fields
        ]);

        // Retrieve invitation by token
        $invitation = Invitation::where('token', $token)->first();

        // Check if the invitation is valid
        if ($invitation && !$invitation->is_used) {
            // Update user information
            $user = User::find($invitation->user_id);
            $user->update([
                'role' => 'employee',
                'password' => bcrypt($request->input('password')),
                'name' => $request->input('name'),
                'adress' => $request->input('adress'),
                'phone' => $request->input('phone'),
                'date_of_birth' => $request->input('date_of_birth'),
            ]);

            // Mark the invitation as used
            $invitation->update(['is_used' => true]);
        
            // Supprimer l'invitation après utilisation
            $invitation->delete();

            session()->flash('success', 'Bienvenue ! Vous avez rejoint la société avec succès.');

            return redirect('/employee/dashboard');
        } else {
            abort(404); // Ou redirigez vers une page d'erreur
        }
    }

    // public function accept($token)
    // {
    //     // Recherche de l'invitation correspondante
    //     $invitation = Invitation::where('token', $token)->first();

    //     // Vérifier si l'invitation existe et n'a pas déjà été utilisée
    //     if (!$invitation || $invitation->is_used) {
    //         abort(404); // Ou redirigez vers une page d'erreur
    //     }

    //     // Marquer l'invitation comme utilisée
    //     $invitation->update(['is_used' => true]);

    //     // Ajouter l'employé à la société spécifiée
    //     User::create([
    //         'email' => $invitation->email,
    //         'company_id' => $invitation->company_id,
    //         'role' => 'employee',
    //     ]);

    //     // Supprimer l'invitation après utilisation
    //     $invitation->delete();

    //     session()->flash('success', 'Bienvenue ! Vous avez rejoint la société avec succès.');

    //     // Vous pouvez rediriger l'utilisateur vers une page spécifique
    //     return redirect('/employee/dashboard');
    // }

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
        $invitationLink = route('invitation.accept.form', ['token' => $token]);

        // Envoyer l'email d'invitation
        Mail::to($request->input('email'))->send(new InvitationMail($invitationLink));

        session()->flash('success', 'L\'invitation a été envoyée avec succès.');

        return redirect()->route('invitation.create');
    }

}