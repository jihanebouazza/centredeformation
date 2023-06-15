<?php

namespace App\Models;

use App\Models\User;
use App\Models\Classe;
use App\Models\Seance;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Seance extends Model
{
    use HasFactory;
    protected $fillable = [
        'formateur_id',
        'groupe_id',
        'time_id',
        'classe_id',
        'matiere_id',
    ];
    
    protected $with = ['groupe', 'time', 'matiere', 'formateur', 'classe'];

    function time()
    {
        return $this->belongsTo(Time::class);
    }
    function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }
    function groupe()
    {
        return $this->belongsTo(Groupe::class);
    }
    function formateur()
    {
        return $this->belongsTo(User::class , 'formateur_id');
    }
    function classe()
    {
        return $this->belongsTo(Classe::class);
    }
}
