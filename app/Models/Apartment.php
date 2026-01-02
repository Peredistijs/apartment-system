<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $fillable = [
        'address',
        'apartment_number',
        'owner_id',
        'resident_id',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function resident()
    {
        return $this->belongsTo(User::class, 'resident_id');
    }

    public function meter()
    {
        return $this->hasOne(Meter::class);
    }
}
