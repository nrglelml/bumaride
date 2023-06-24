<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
//use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    public function requestedTrips()
    {
        return $this->hasMany(Trip::class, 'requested_user_id');
    }

    public function approvedTrips()
    {
        return $this->belongsToMany(Trip::class, 'trip_user', 'user_id', 'trip_id')
            ->withPivot('status')
            ->wherePivot('status', 'approved');
    }
    public function travels()
    {
        return $this->hasMany(Trip::class);
    }

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
     protected $fillable = [
         'username',
         'first_name',
         'last_name',
         'phone_number',
         'password',
         'about',
         'avatar',
         'vehicle_info',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        //'email_verified_at' => 'datetime',
        'phone_number' => 'string',
    ];
}
