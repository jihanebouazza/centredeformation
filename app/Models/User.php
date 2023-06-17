<?php

namespace App\Models;

use App\Models\Seance;
use App\Models\Inscription;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'last_name',
        'first_name',
        'email',
        'password',
        'code',
        'telephone',
        'specialisation',
        'code_reset',
        'image',
        'role',
    ];
    function seances()
    {
        return $this->hasMany(Seance::class);
    }
    function inscriptions()
    {
        return $this->hasMany(Inscription::class , 'etudiant_id');
    }
        public function hasGroup()
        {
            return $this->inscriptions()
                ->whereHas('groupe', function ($query) {
                    $query->whereIn('statut', ['started','full','open']);
                })->exists();
        }
        public function getGroup()
    {
        return $this->inscriptions()
            ->whereHas('groupe', function ($query) {
                $query->whereIn('statut', ['started', 'full', 'open']);
            })
            ->with('groupe')
            ->get()
            ->pluck('groupe');
    }

    public function hasRole(string $roleName): bool
    {
        return $this->role === $roleName;
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
