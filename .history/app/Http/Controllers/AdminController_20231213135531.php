<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Logique du tableau de bord de l'administrateur
        return view('admin.dashboard');
    }

    public function createCompany(Request $request)
    {
        // Logique de création d'entreprise par l'administrateur
    }

    public function inviteEmployee(Request $request)
    {
        // Logique d'invitation d'un employé par l'administrateur
    }

    public function createForm()
    {
        // Affiche le formulaire de création d'administrateur
        return view('admin.create');
    }

    public function create(Request $request)
    {
        // Logique de création d'un nouvel administrateur
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        return redirect('/admin/dashboard');
    }
}