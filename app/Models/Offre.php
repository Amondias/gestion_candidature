<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Offre extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_entreprise',
        'numero',
        'email',
        'titre',
        'domaine',
        'specialisation',
        'qualification',
        'competence',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function followers()
    {
        return $this->morphMany(Follow::class, 'followable');
    }
}
