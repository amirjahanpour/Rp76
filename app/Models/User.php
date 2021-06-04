<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    const ID = "id",
        STATE_ID="state_id",
        CITY_ID="city_id",
        NAME = "name",
        EMAIL = "email",
        PASSWORD = "password",
        USERNAME = "username",
        IMAGE = "image";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        self::STATE_ID,
        self::CITY_ID,
        self::NAME,
        self::EMAIL,
        self::PASSWORD,
        self::USERNAME,
        self::IMAGE,
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
}
