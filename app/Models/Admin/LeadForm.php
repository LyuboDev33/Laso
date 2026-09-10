<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class LeadForm extends Model
{
    //
      protected $fillable = [
        'user_id',
        'form_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
