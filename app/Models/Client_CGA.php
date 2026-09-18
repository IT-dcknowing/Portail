<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class client_CGA extends Model
{
    use HasFactory;

    protected $table = 'client_cga'; // Nom de la table

    protected $fillable = [
        'nom',
        'email',
        'telephone',
        'ville',
        'entreprise',
        'secteur',
        'statut',
        'effectif',
        'services',
        'nom_commercial',
        'capital',
        'rccm',
        'num_contribuable',
        'idu',
        'code_activite',
        'centre_impots',
        'type_regime',
        'localisation_geo',
        'section',
        'parcelle',
        'siege',
        'boite_postale',
        'chiffre_affaire',
        'debut_activite',
        'activites',
        'representant_legal',
        'qualite_representant',
        'message',
        'attachment',
        'newsletter'
    ];

    protected $casts = [
        'services' => 'array', // Automatiquement convertit JSON en array
        'newsletter' => 'boolean',
        'debut_activite' => 'date'
    ];
}