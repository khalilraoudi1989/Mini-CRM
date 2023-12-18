<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\History;

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

    public function create()
    {
        // Affiche le formulaire de création d'administrateur
        return view('admin.create');
    }

    public function store(Request $request)
    {

            // Validate the request data
            $request->validate([
                'name' => 'required|min:3',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
            ], [
                'name.required' => 'Please enter a name.',
                'name.min' => 'The name must be at least 3 characters long.',
                'email.required' => 'Please enter an email address.',
                'email.email' => 'Please enter a valid email address.',
                'email.unique' => 'This email address is already taken.',
                'password.required' => 'Please enter a password.',
                'password.min' => 'The password must be at least 6 characters long.',
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

    public function history()
    {
        $historyEntries = History::latest()->paginate(10);
        return view('admin.history', compact('historyEntries'));
    }

}