<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkDay extends Model
{
    protected $fillable = [
        'day',
        'time_slot',
        'from_time',
        'to_time'
    ];

    protected $casts = [
        'from_time' => 'datetime',
        'to_time' => 'datetime'
    ];


   

}

