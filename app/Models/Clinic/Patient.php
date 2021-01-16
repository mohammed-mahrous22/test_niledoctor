<?php

namespace App\Models\Clinic;

use App\Models\Reception\Appointment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'address',
        'age',
        'medical_history',
        'diagnoses',
        'treatment',
        'weight',
        'BP',
        'HR',
        'Doctor_id',
    ];

    public function Doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
