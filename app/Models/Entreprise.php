<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Entreprise extends Model
{
    use HasFactory;

    protected $fillable = [
        'forme_juridique', 'denomination_sociale', 'capital_social', 
        'nombre_associes', 'objet_social', 'siege_social',
        'ville', 'duree_entreprise', 'nom_representant', 'nationalite', 'date_naissance',
        'lieu_naissance', 'adresse_representant', 'telephone', 'email',
        'piece_identite', 'justificatif_domicile', 'autres_documents',
        'statut', 'user_id'
    ];

    protected $casts = [
        'autres_documents' => 'array', // Pour manipuler facilement le JSON
        'date_naissance' => 'date',
        'date_demande' => 'datetime',
    ];

    // Relation avec l'utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

