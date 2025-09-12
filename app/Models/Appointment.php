<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Appointment extends Model
{
    use HasFactory;
    //
    protected $fillable = [
        'customer_name',
        'customer_phone',
        'service',
        'appointment_date',
        'appointment_time',
        'notes',
    ];
    public function barber()
    {
        return $this->belongsTo(User::class, 'barber_id');
    }
}
