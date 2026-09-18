<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModificationEntreprise extends Model
{
    use HasFactory;

    // Nom de la table
    protected $table = 'modifications_entreprise';

    // Attributs assignables en masse
    protected $fillable = [
        'forme_juridique',
        'denomination_sociale',
        'capital_social',
        'nombre_associes',
        'objet_social',
        'siege_social',
        'ville',
        'duree_entreprise',
        'statut',
        'date_demande',
        'date_traitement',
        'commentaire_rejet',
        'user_id',
        'admin_id',
    ];

    // Conversion des types
    protected $casts = [
        'capital_social'   => 'decimal:2',
        'nombre_associes'  => 'integer',
        'duree_entreprise' => 'integer',
        'date_demande'     => 'datetime',
        'date_traitement'  => 'datetime',
    ];

    // Valeurs par défaut
    protected $attributes = [
        'statut' => 'en_attente',
    ];

    /**
     * Relations avec l'utilisateur (auteur de la demande)
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relation avec l'administrateur qui traite la demande
     */
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}
