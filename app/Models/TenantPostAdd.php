<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenantPostAdd extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'gender',
        'ageone',
        'agetwo',
        'occupation',
        'staymin',
        'staymax',
        'langauge',
        'nationality',
        'hobby',
        'movingdate',
        'price_min',
        'price_max',
        'price_due',
        'deposit',
        'property_type',
        'bed_min',
        'bed_max',
        'bath_min',
        'bath_max',
        'bath_toilet',
        'bath_private',
        'furnishing',
        'misc',
        'property_features',
        'latitude',
        'longtitude',
        'ad_title',
        'ad_desc',
        'ad_firstname',
        'ad_lastname',
        'ad_display',
        'ad_email',
        'ad_phone',
        'ad_hide_phone',
        'email_alerts',
        'membership',
     
    ];
}
