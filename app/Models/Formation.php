<?php

namespace App\Models;

use App\Models\Groupe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Formation extends Model
{
    use HasFactory;
    protected $fillable = [

        'titre',
        'description',
        'prix',
        'duree',
        'image',
    ];
    function groupes()
    {
        return $this->hasMany(Groupe::class);
    }
    public function hasOpenGroup()
        {
            return $this->groupes()->where('statut', 'open')->exists();
        }
    public function OpenGroup()
    {
        return $this->groupes()->where('statut', 'open')->first();    }
}
