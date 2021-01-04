<?php

namespace App\Models\Reception;

use App\Models\Clinic\Doctor;
use App\Models\Clinic\Patient;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable =[
        'patient_name',
        'patient_age',
        'patient_address',
        'patient_phone',
        'date',
        'price',
        'time',
        'doctor_id',
    ];



    protected $hidden = ['created_at','updated_at'];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

}
