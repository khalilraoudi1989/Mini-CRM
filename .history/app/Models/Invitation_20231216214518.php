<?php

// app/Models/Invitation.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    protected $fillable = ['email', 'token', 'company_id', 'confirmed'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
