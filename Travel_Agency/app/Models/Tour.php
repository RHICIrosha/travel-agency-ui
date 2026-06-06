<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $guarded = [];

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}
