<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',       // nom du plan
        'price',      // prix
        'is_active',  // actif ou non
    ];

    // Tu peux ajouter des relations si nécessaire
}
