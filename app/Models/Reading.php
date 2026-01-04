<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reading extends Model
{
    protected $fillable = [
        'meter_id',
        'user_id',
        'value',
        'status',
        'submission_date',
    ];

    public function meter()
    {
        return $this->belongsTo(Meter::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getStatusLvAttribute() //converts statuses to latvian in blade
    {
        return match ($this->status) {          
            'pending' => 'Gaida apstiprinājumu',
            'approved' => 'Apstiprināts',
            'rejected' => 'Atmests',
            default => $this->status,
        };
    }
}
