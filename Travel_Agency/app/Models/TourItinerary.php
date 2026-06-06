<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourItinerary extends Model
{
    protected $guarded = [];

    protected $casts = [
        'activities' => 'array',
    ];

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
