<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_type',
        'name',
    ];

    public function pricing(){
        return $this->hasOne(Pricing::class,'plan_id','id');
    }

}
