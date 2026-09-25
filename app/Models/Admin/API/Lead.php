<?php

namespace App\Models\Admin\API;

use App\Models\User;
use App\Models\Admin\LeadForm;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lead extends Model
{
    protected $fillable = [
        'user_id',
        'lead_form_id',
        'facebook_lead_id',
        'facebook_ad_id',
        'is_seen',
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

    public function leadForm(): BelongsTo
    {
        return $this->belongsTo(LeadForm::class, 'lead_form_id');
    }
}
