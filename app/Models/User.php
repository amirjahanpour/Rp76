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
        STATE_ID = "state_id",
        CITY_ID = "city_id",
        RESUME = "resume",
        ELECTION = "election",
        PHONE = "phone",
        MOBILE = "mobile",
        NAME = "name",
        EMAIL = "email",
        PASSWORD = "password",
        USERNAME = "username",
        OBLIGATION = "obligation",
        USER_ID = "user-id",
        IS_ADMIN = "is_admin",
        IMAGE = "image",
        IMAGE_TWO = "image_two",
        IMAGE_THREE = "image_three",
        IMAGE_FOUR = "image_four",
        IMAGE_FIVE = "image_five";

    const ELECTION_LIST = [
        "نام انتخابات",
        "انتخابات ریاست جمهوری",
        "انتخابات مجلس خبرگان رهبری",
        "انتخابات مجلس شورای اسلامی",
        "انتخابات شورای اسلامی شهر و روستا",
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        self::RESUME,
        self::ELECTION,
        self::STATE_ID,
        self::CITY_ID,
        self::PHONE,
        self::MOBILE,
        self::NAME,
        self::EMAIL,
        self::PASSWORD,
        self::USERNAME,
        self::OBLIGATION,
        self::USER_ID,
        self::IS_ADMIN,
        self::IMAGE,
        self::IMAGE_TWO,
        self::IMAGE_THREE,
        self::IMAGE_FOUR,
        self::IMAGE_FIVE,
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

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
