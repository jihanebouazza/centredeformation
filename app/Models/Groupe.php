<?php

namespace App\Models;

use App\Models\User;
use App\Models\Formation;
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
    function etudiants()
    {
        return $this->hasMany(User::class);
    }
    protected static function boot()
    {
        parent::boot();

        // Define the 'saving' event
        static::saving(function ($groupe) {
            $groupe->nombre_etudiant = $groupe->etudiants()->count();
            if ($groupe->capacite == $groupe->nombre_etudiant) {
                $groupe->statut = 'full';
            }

        });
    }
}
