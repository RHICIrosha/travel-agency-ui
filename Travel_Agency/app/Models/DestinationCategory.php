<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DestinationCategory extends Model
{
    protected $fillable = ['name', 'icon', 'image_url'];

    public function locations()
    {
        return $this->hasMany(DestinationLocation::class);
    }
}
