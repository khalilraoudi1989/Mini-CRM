<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort', 'name');

        $employees = Employee::when($search, function ($query) use ($search) {
        $query->where('name', 'like', "%$search%");
        })
        ->orderBy($sort)
        ->get();

        return view('employee.index', compact('employees'));
    }

    public function updateProfile(Request $request)
    {
        // Logique de mise à jour du profil de l'employé
    }

    public function viewCompanyData()
    {
        // Logique de visualisation des données de l'entreprise par l'employé
    }
}
