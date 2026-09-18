<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_name',
        'legal_form',
        'siret',
        'address',
        'postal_code',
        'city',
        'creation_status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function scopePending($query)
    {
        return $query->where('creation_status', 'pending');
    }

    public function scopeCompleted($query)
    {
        return $query->where('creation_status', 'completed');
    }
}