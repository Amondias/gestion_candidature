<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Demande extends Model
{
    use HasFactory;

    protected $fillable = [
    'nom_complet',
    'numero',
    'domaine',
    'specialisation',
    'qualification',
    'competence',
    'user_id',
    ];


    // Créateur de la demande
    public function user()
    {
        return $this->belongsTo(User::class,);
    }

    // Offreurs ayant consulté ou sélectionné la demande (à adapter selon logique métier)
    public function recruteurs()
    {
        return $this->belongsToMany(User::class, 'candidatures', 'demande_id', 'user_id');
    }

    public function followers()
    {
        return $this->morphMany(Follow::class, 'followable');
    }
}
