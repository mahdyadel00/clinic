<?php

namespace App\Models;

use App\Models\Major;
use App\Models\Booking;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'speciality',
        'address',
        'phone',
        'experience_years',
        'bio'
    ];

    public function user() {

        return $this->belongsTo(User::class);
    }

    public function complaints() {

        return $this->hasMany(Complaint::class);
    }

    public function appointments() {

        return $this->hasMany(Appointment::class);
    }
}
