<?php

namespace App\Models;

use App\Models\User;
use App\Models\Groupe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inscription extends Model
{
    use HasFactory;
    function groupe()
    {
        return $this->belongsTo(Groupe::class,'groupe_id');
    }
    function etudiant()
    {
        return $this->belongsTo(User::class,'etudiant_id');
    }
}
