<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Dans le modèle History
class History extends Model
{
    protected $fillable = ['user_id', 'action', 'description'];
}
