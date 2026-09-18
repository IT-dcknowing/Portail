<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_id',
        'name',
        'file_path',
        'document_type',
        'status',
    ];

    // Relations
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    // Scopes
    public function scopeDraft($query)
    {
        return $query->where('status', 'draft');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeValidated($query)
    {
        return $query->where('status', 'validated');
    }

    // Helpers
    public function isDraft()
    {
        return $this->status === 'draft';
    }

    public function isPending()
    {
        return $this->status === 'pending';
    }

    public function isValidated()
    {
        return $this->status === 'validated';
    }

    public function getFileUrl()
    {
        return Storage::url($this->file_path);
    }

    public function getDocumentTypeLabel()
    {
        $types = [
            'statuts' => 'Statuts',
            'kbis' => 'Extrait K-bis',
            'cin' => 'Carte d\'identité',
            'justificatif_domicile' => 'Justificatif de domicile',
            'attestation_bancaire' => 'Attestation bancaire',
            'contrat' => 'Contrat',
            'autre' => 'Autre document',
        ];

        return $types[$this->document_type] ?? $this->document_type;
    }
}