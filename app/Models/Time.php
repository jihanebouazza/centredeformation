<?php

namespace App\Models;

use App\Models\Seance;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Time extends Model
{
    use HasFactory;
    function seances()
    {
        return $this->hasMany(Seance::class);
    }
}
