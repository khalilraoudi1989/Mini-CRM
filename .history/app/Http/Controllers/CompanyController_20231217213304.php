<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Models\Company;
use App\Models\User;

class CompanyController extends Controller
{   

    public function index(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort', 'name');

        $companies = Company::when($search, function ($query) use ($search) {
            $query->where('name', 'like', "%$search%");
        })
        ->orderBy($sort)
        ->get();

        return view('company.index', compact('companies'));
    }

    public function create()
    {
        // Display the form for creating a new company
        return view('company.create');
    }

    public function store(Request $request)
    {
        // Validate and store the newly created company
        Company::create($request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            // Add other fields as needed
        ]));

        return redirect()->route('company.index')->with('success', 'Company created successfully');
    }

    public function edit(Company $company)
    {
        // Display the form for editing a company
        return view('company.edit', compact('company'));
    }

    public function update(Request $request, Company $company)
    {
        // Validate and update the company
        $company->update($request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            // Add other fields as needed
        ]));

        return redirect()->route('company.index')->with('success', 'Company updated successfully');
    }

    public function destroy(Company $company)
    {
        // Vérifier si la société a des employés
        $hasEmployees = Employee::where('company_id', $company->id)->exists();

        if ($hasEmployees) {
            return redirect()->route('company.index')->with('error', 'La société a des employés et ne peut pas être supprimée.');
        }

        // Supprimer la société seulement si elle n'a pas d'employés
        $company->delete();

        return redirect()->route('company.index')->with('success', 'La société a été supprimée avec succès.');
    }

    public function viewDetails($company_id)
    {
        $user = Auth::user();
        if ($user->company_id == $company_id) {
            abort(403, 'Accès interdit aux données de cette société.');
        }
    
        $company = User::findOrFail($company_id);
        return view('company.details', compact('company'));
    }

}