<?php

namespace App\Models;

use App\Models\Admin\Clinic;
use App\Models\Adminstration\Admin;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Clinic\Doctor;
use App\Models\Reception\Receptionist;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'type',
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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function gettype()
    {
        $type = $this->type;
        switch ($type) {
            case 'doctor':
                return $this->hasOne(Doctor::class);
                break;
            case 'receptionist':
                return $this->hasOne(Receptionist::class);
                break;

            default:
            abort(403);
                break;
        }


    }

    public function Admin()
    {
        return $this->belongsTo(Clinic::class);
    }
}
