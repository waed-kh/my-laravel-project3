<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectContact extends Model
{
    protected $fillable = [
        'phone',
        'whatsAppNumber',
        'email',
        'facebook_url',
        'instagram_url'
    ];
}
