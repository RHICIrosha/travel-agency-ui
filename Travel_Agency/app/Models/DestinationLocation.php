<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DestinationLocation extends Model
{
    protected $fillable = ['destination_category_id', 'name', 'region'];

    public function category()
    {
        return $this->belongsTo(DestinationCategory::class, 'destination_category_id');
    }
}
