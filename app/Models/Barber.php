<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barber extends Model
{
    //
    protected $fillable = [
        'name',
        'phone',
        'address',
        'email',
    ];

    public function appointments()
    {
        return $this->hasMany(\App\Models\Appointment::class, 'barber_id');
    }

    public function barberAppointments()
    {
        return $this->hasMany(Appointment::class, 'barber_id');
    }
}
