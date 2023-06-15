<?php

namespace App\Models;

use App\Models\User;
use App\Models\Formation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Inscription;

class Groupe extends Model
{
    use HasFactory;
    protected $fillable = [

        'nom',
        'capacite',
        'date_debut',
        'date_fin',
        'formation_id',
        'nombre_etudiant',
        'statut',
    ];
    function formation()
    {
        return $this->belongsTo(Formation::class);
    }
    function inscriptions()
    {
        return $this->hasMany(Inscription::class);
    }
    
}
