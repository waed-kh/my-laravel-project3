<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'image'
    ];

    public function getImgPathAttribute()
    {
        if (!$this->image) {
            return;
        }

        return asset('images/categories/' . $this->image);
    }
}
