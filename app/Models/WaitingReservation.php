<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaitingReservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'room_id',
        'doctor_id',
        'reservation_time',
        'status'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
