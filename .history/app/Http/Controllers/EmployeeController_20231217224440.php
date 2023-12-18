<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        
        $search = $request->input('search');
        $sort = $request->input('sort', 'name');

        $employees = User::when($search, function ($query) use ($search) {
            $query->where('name', 'like', "%$search%")
                  ->where('role', '=', 'employee');
        })
        ->orderBy($sort)
        ->get();

        return view('employee.index', compact('employees'));
    }

    public function dashboard(Request $request)
    {
        $user = Auth::user();
        $employees = User::where('role', 'employee')
        ->where('company_id', $user->company_id)
        ->get();

        return view('employee.dashboard', compact('employees'));
    }

    public function viewDetails($employee_id)
    {
        $user = Auth::user();       
        $employee = User::findOrFail($employee_id);
        if ($user->company_id != $employee->company_id) {
            abort(403, 'Accès interdit aux employés de cette société.');
        }
        return view('employee.details', compact('employee'));
    }

    public function profile()
    {
        $employee = Auth::user();
    
        return view('employee.profile', compact('employee'));
    }

    public function updateProfile()
    {
        $employee = Auth::user();
    
        $data = request()->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
        ]);
    
        $employee->update($data);
    
        return redirect('/employee/profile')->with('success', 'Profil mis à jour avec succès.');
    }
}