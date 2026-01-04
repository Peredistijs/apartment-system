<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meter extends Model
{
    protected $table = 'meter'; //gave the table wrong name initially, had to be meters, to avoid this line
    
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

    public function getTypeLvAttribute() //returns meter type in latvian (english in DB)
    {
        return match ($this->type) {
            'Water' => 'Ūdens',
            'Electric' => 'Elektrība',
            'Gas' => 'Gāze',
            default => $this->type,
        };
    }
}
