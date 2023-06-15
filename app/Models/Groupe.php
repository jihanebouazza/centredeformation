<?php

namespace App\Models;

use App\Models\User;
use App\Models\Seance;
use App\Models\Formation;
use App\Models\Inscription;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
    function seances()
    {
        return $this->hasMany(Seance::class);
    }
    
}
