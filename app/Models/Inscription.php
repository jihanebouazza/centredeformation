<?php

namespace App\Models;

use App\Models\User;
use App\Models\Groupe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inscription extends Model
{
    use HasFactory;
    protected $fillable = [

        'etudiant_id',
        'groupe_id',
    ];
    function groupe()
    {
        return $this->belongsTo(Groupe::class,'groupe_id');
    }
    function etudiant()
    {
        return $this->belongsTo(User::class,'etudiant_id');
    }
    protected static function boot()
    {
        parent::boot();

        static::created(function ($inscription) {
            $groupe = $inscription->groupe;
            $groupe->nombre_etudiant = $groupe->inscriptions()->count();
            if ($groupe->capacite == $groupe->nombre_etudiant) {
                $groupe->statut = 'full';
            }
            $groupe->save();
        });

        static::updated(function ($inscription) {
            $groupe = $inscription->groupe;
            $groupe->nombre_etudiant = $groupe->inscriptions()->count();
            if ($groupe->capacite == $groupe->nombre_etudiant) {
                $groupe->statut = 'full';
            }
            $groupe->save();
        });

        static::deleted(function ($inscription) {
            $groupe = $inscription->groupe;
            $groupe->nombre_etudiant = $groupe->inscriptions()->count();
            if ($groupe->capacite == $groupe->nombre_etudiant) {
                $groupe->statut = 'full';
            }
            $groupe->save();
        });
    }
}
