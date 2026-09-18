<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ActeJuridique extends Model
{
    use HasFactory;

    protected $table = 'actes_juridiques';

    protected $fillable = [
        'titre',
        'date',
        'description',
        'email'
    ];

    protected $casts = [
        'date' => 'date'
    ];

    // Scope pour filtrer par date
    public function scopeByDate($query, $date)
    {
        return $query->where('date', $date);
    }

    // Scope pour rechercher par titre
    public function scopeSearchByTitle($query, $search)
    {
        return $query->where('titre', 'like', '%' . $search . '%');
    }
}
