<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meter extends Model
{
    protected $fillable = [
        'apartment_id',
        'type',
        'setup_date',
        'starting_reading',
    ];

    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }

    public function readings()
    {
        return $this->hasMany(Reading::class);
    }
}
