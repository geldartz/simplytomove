<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandPostAdd extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'typeOnwer',
        'price',
        'duration',
        'dss',
        'dss_due',
        'deposit',
        'available_date',
        'staymin',
        'staymax',
        'property_type',
        'occupancy',
        'bedroom',
        'bathroom',
        'latitude',
        'longtitude',
        'bath_toilet',
        'furnishing',
        'utilities',
        'misc',
        'images',
        'video_link',
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
