<?php

namespace App\Models\Clinic;

use App\Models\Admin\Clinic;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [ 'name','Phone_number'

    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }
    public function speciality()
    {
        return $this->belongsTo(Speciality::class);
    }


}
