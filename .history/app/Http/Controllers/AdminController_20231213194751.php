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
        // Retrieve a list of administrators
        $administrators = User::where('role', 'admin')->get();

        // Pass the data to the view
        return view('admin.dashboard', compact('administrators'));
    }

    public function createCompany(Request $request)
    {
        // Logique de création d'entreprise par l'administrateur
    }

    public function inviteEmployee(Request $request)
    {
        // Logique d'invitation d'un employé par l'administrateur
    }

    public function create()
    {
        // Affiche le formulaire de création d'administrateur
        return view('create');
    }

    public function store(Request $request)
    {

            // Validate the request data
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
                // Add other validation rules as needed
            ]);
    
            // Create a new administrator
            $admin = new User;
            $admin->name = $request->input('name');
            $admin->email = $request->input('email');
            $admin->password = bcrypt($request->input('password'));
            $admin->role = 'admin'; // Assuming 'admin' as the role for administrators
            $admin->save();
    
            return redirect('/admin/dashboard');
    }
}