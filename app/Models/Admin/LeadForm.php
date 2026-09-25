<?php

namespace App\Models\Admin;

use App\Models\User;
use App\Models\Admin\API\Lead;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LeadForm extends Model
{
    protected $fillable = [
        'user_id',
        'form_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function leads(): HasMany
    {
        return $this->hasMany(Lead::class, 'lead_form_id');
    }
}
