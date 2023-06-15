<?php

namespace App\Models;

use App\Models\Seance;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classe extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
    ];
    function seances()
    {
        return $this->hasMany(Seance::class);
    }
}
