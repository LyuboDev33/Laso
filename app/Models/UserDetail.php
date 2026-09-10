<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    protected $fillable = [
        'user_id',
        'company_name',
        'business_description',
        'website',
        'city',
        'phone',
        'brand_information',
        'logo',
        'images',
        'videos',
        'voice_recording',
        'video_ad_requirements',
        'additional_notes',
    ];

    protected $casts = [
        'images' => 'array',
        'videos' => 'array',
    ];
}
