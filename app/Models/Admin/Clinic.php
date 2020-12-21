<?php

namespace App\Models\Admin;

use App\Models\Clinic\Doctor;
use App\Models\Reception\Receptionist;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }
    public function receptionists()
    {
        return $this->hasMany(Receptionist::class);
    }
    /* public function doctors()
    {
        return $this->hasMany(Doctor::class);
    } */
}
