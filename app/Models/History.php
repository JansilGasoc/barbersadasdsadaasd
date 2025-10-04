<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    //
    protected $fillable = [
        'barber_id',
        'customer_name',
        'customer_phone',
        'service',
        'appointment_date',
        'appointment_time',
        'notes',
    ];

    public function barber()
    {
        return $this->belongsTo(Barber::class);
    }
}
