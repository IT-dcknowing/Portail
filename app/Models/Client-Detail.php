<?php

namespace App\Models;
use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class ClientDetail extends Model
{
    // Use the HasFactory trait for factory support
  use HasFactory;

    protected $fillable = [
        'company_id',
        'user_id',
        'company_name',
        'company_name_com',
        'address',
        'shipping_address',
        'postal_code',
        'state',
        'city',
        'office',
        'website',
        'note',
        'linkedin',
        'facebook',
        'twitter',
        'skype',
        'tax_name',
        'gst_number',
        'category_id',
        'sub_category_id',
        'added_by',
        'last_updated_by',
        'company_logo',
        'quickbooks_client_id',
        'electronic_address',
        'electronic_address_scheme',
        'numcga',
        'numadh',
        'numrccm',
        'numcc',
        'formjurid',
        'regime',
        'acti_prin',
        'section',
        'parcelle',
        'imp_centre',
        'codeacti',
        'montcapit',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    protected $table = 'client_details';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
