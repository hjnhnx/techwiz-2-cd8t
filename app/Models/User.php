<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'password',
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'drivers_license_photo',
        'driving_license_number',
        'driving_license_valid_from',
        'driving_license_valid_to',
        'identification_type',
        'identification_id',
        'identification_valid_from',
        'identification_valid_to',
        'email_preference',
        'is_smoking_allowed',
        'is_pet_allowed',
        'music_preference',
        'chitchat_preference',
        'role',
        'is_driving_license_certified',
        'device_token',
    ];
    public function cars(){
        return $this->hasMany(Car::class);
    }
    public function rideRequests(){
        return $this->hasMany(Request::class);
    }
    public function feedbacks(){
        return $this->hasMany(Feedback::class);
    }
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

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
}
