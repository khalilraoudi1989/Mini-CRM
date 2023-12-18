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
        $admin = new Admin;
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->password = bcrypt($request->input('password'));
        $admin->save();

        return redirect('/admin/dashboard');
    }
}