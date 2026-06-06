<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $guarded = [];

    protected $casts = [
        'inclusions' => 'array',
        'themes' => 'array',
    ];

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }

    public function itineraries()
    {
        return $this->hasMany(TourItinerary::class)->orderBy('day_number');
    }
}
