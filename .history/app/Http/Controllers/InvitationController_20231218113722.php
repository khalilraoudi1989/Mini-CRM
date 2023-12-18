<?php

// app/Http/Controllers/InvitationController.php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Mail\InvitationMail;
use App\Models\Company;
use App\Models\User;
use App\Models\History;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

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
            // Enregistrement dans la table "histories"
            $history = new History();
            $history->user_id = auth()->user()->id; // Utilisez l'ID de l'utilisateur actuel
            $history->action = 'Invitation envoyée';

            // Utiliser sprintf pour formater la chaîne de description
            $history->description = sprintf(
                '%s / “%s” à valider l’invitation',
                now()->format('d-m-Y - H:i'), // Format de la date et de l'heure
                $employee->name // Nom de l'employé
            );

            $history->save();

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
            $user = User::create([
                'email' => $invitation->email,
                'company_id' => $invitation->company_id, // Replace with the actual company_id value
                'role' => 'employee',
                'password' => bcrypt($request->input('password')),
                'name' => $request->input('name'),
                'address' => $request->input('address'),
                'phone' => $request->input('phone'),
                'date_of_birth' => $request->input('date_of_birth'),
                'verified' => true, // Set a flag indicating the account is verified
            ]);
            // Mark the invitation as used
            $invitation->update(['is_used' => true]);
        
            // Supprimer l'invitation après utilisation
            $invitation->delete();
            // Manually log in the newly registered employee
            Auth::login($user);
            session()->flash('success', 'Bienvenue ! Vous avez rejoint la société avec succès.');

            return redirect('/employee/dashboard');
        } else {
            abort(404); // Ou redirigez vers une page d'erreur
        }
    }

    public function create()
    {
        $companies = Company::all();

        return view('invitation.invite-employee', compact('companies'));
    }

    public function send(Request $request)
    {
        // Générer un token unique
        $token = Str::uuid();

        // Enregistrement de l'invitation dans la base de données
        $invitation = Invitation::create([
            'email' => $request->input('email'),
            'name' => $request->input('name'),
            'token' => $token,
            'company_id' => $request->input('company_id'),
        ]);

        // Construire le lien d'invitation
        $invitationLink = route('invitation.accept.form', ['token' => $token]);
        
        // Récupérer l'ID de l'utilisateur à partir de l'adresse e-mail
        $employeeName = $request->input('name');
        // Récupérer la société à partir de l'ID
        $companyId = $request->input('company_id');
        $company = Company::find($companyId);
        $history = new History();
        $history->user_id = auth()->user()->id; // Utilisez l'ID de l'utilisateur actuel
        $history->action = 'Invitation envoyée';
        $history->description = sprintf(
            '%s / Admin “%s” a invité l\'employé “%s” à joindre la société “%s”',
            now()->format('d-m-Y - H:i'), // Format de la date et de l'heure
            auth()->user()->name, // Nom de l'administrateur
            $employeeName, // Nom de l'employé
            $company->name // Nom de la société
        );
        $history->save();

        // Envoyer l'email d'invitation
        Mail::to($request->input('email'))->send(new InvitationMail($invitationLink));

        session()->flash('success', 'L\'invitation a été envoyée avec succès.');

        return redirect()->route('invitation.create');
    }

}