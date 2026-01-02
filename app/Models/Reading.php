<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reading extends Model
{
    protected $fillable = [
        'meter_id',
        'value',
        'status',
        'submission_date',
    ];

    public function meter()
    {
        return $this->belongsTo(Meter::class);
    }
}
