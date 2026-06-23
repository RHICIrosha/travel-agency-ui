<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeaturedDestination extends Model
{
    protected $guarded = [];

    protected $casts = [
        'is_active'          => 'boolean',
        'is_featured_large'  => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('sort_order');
    }

    public function getDisplayImageAttribute()
    {
        if ($this->image_upload) {
            return asset('storage/' . $this->image_upload);
        }
        return $this->image_url;
    }
}
