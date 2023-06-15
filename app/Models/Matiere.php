<?php

namespace App\Models;

use App\Models\Formation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Matiere extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'formation_id',
    ];
    function formation()
    {
        return $this->belongsTo(Formation::class);
    }
}
