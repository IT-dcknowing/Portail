<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Radiation extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'siret',
        'legal_form',
        'reason',
        'date_radiation',
        'contact_email',
        'user_id',
    ];
}
