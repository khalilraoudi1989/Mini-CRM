<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function create()
    {
        // Display the form for creating a new company
        return view('companies.create');
    }

    public function store(Request $request)
    {
        // Validate and store the newly created company
        Company::create($request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            // Add other fields as needed
        ]));

        return redirect()->route('companies.index')->with('success', 'Company created successfully');
    }

    public function edit(Company $company)
    {
        // Display the form for editing a company
        return view('companies.edit', compact('company'));
    }

    public function update(Request $request, Company $company)
    {
        // Validate and update the company
        $company->update($request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            // Add other fields as needed
        ]));

        return redirect()->route('companies.index')->with('success', 'Company updated successfully');
    }

    public function destroy(Company $company)
    {
        // Delete the company
        $company->delete();

        return redirect()->route('companies.index')->with('success', 'Company deleted successfully');
    }
}
