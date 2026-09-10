<?php

namespace App\Models\Admin\API;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lead extends Model
{
    protected $fillable = [
        'user_id',
        'facebook_lead_id',
        'facebook_form_id',
        'facebook_ad_id',
        'full_name',
        'email',
        'phone',
        'questions',
        'facebook_created_at',
    ];

    protected $casts = [
        'questions' => 'array',
        'facebook_created_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
