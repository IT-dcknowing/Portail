<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DemandeEntreprise extends Model
{
    use HasFactory;

    protected $fillable = [
        'entreprise_id',
        'user_id',
        'statut',
        'motif_rejet',
        'traite_par',
        'date_soumission',
        'date_traitement'
    ];

    protected $casts = [
        'date_soumission' => 'datetime',
        'date_traitement' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Relations
    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }

    public function demandeur()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function traitePar()
    {
        return $this->belongsTo(User::class, 'traite_par');
    }

    // Accesseurs
    public function getStatutLabelAttribute()
    {
        $statuts = [
            'soumise' => 'Soumise',
            'en_cours' => 'En cours de traitement',
            'approuvee' => 'Approuvée',
            'rejetee' => 'Rejetée'
        ];

        return $statuts[$this->statut] ?? 'Inconnu';
    }

    public function getDureeTraitementAttribute()
    {
        if ($this->date_traitement && $this->date_soumission) {
            return $this->date_soumission->diffInDays($this->date_traitement);
        }
        return null;
    }

    // Scopes
    public function scopeEnAttente($query)
    {
        return $query->whereIn('statut', ['soumise', 'en_cours']);
    }

    public function scopeTraitees($query)
    {
        return $query->whereIn('statut', ['approuvee', 'rejetee']);
    }
}
