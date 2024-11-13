<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'dob',
        'phone',
        'address',
        'gender',
        'medical_history',
    ];

    protected $casts = [
        'dob'       => 'date',
        'gender'    => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function waitingReservations()
    {
        return $this->hasMany(WaitingReservation::class);
    }

    public function complaints()
    {
        return $this->hasMany(Complaint::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

}
