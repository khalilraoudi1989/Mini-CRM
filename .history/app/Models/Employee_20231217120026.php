<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends User
{
    protected $table = 'users'; // Use the same users table
    
    // Add attributes specific to employees
    protected $fillable = [
        'address', 'phone', 'date_of_birth', // Add other attributes as needed
    ];
}
