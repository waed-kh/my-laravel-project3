<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Project extends Model
{
    public function gallery(): HasMany
    {
        return $this->hasMany(Gallery::class);
    }

    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class, 'project_service');
    }

    public function contact()
    {
        return $this->hasOne(ProjectContact::class);
    }

    public function workdays(): BelongsToMany
    {
        return $this->belongsToMany(
            WorkDay::class,
            'project_workday',
            'project_id',
            'workday_id',
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

   













  public function getImgPathAttribute()
{
    if ($this->image) {
        return asset('images/projects/' . $this->image);
    }
    return null;
}


    protected $fillable = ['status'];
}
