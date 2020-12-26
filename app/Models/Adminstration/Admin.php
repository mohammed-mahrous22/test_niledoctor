<?php

namespace App\Models\Adminstration;

use App\Models\Admin\Clinic;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $guard = 'admin';

    protected $fillable = [
        'username',
        'password',
    ];

      /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [

        //'isAdmin' => "boolean",

    ];


    public function Clinics()
    {
        return $this->hasMany(Clinic::class);
    }

}
