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
        $employee = User::findOrFail($employee_id);
        return view('employee.details', compact('employee'));
    }

}