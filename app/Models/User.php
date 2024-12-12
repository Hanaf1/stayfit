<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
Use Illuminate\Database\Eloquent\Casts\Attribute;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */


    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *xam
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
 

    public function posts()
    {
        return $this->hasMany(Post::class);
    }


 
    // User.php model

    public function detailsUser()
    {
        return $this->hasOne(DetailsUser::class, 'user');
    }

    public function detaildokter()
    {
        return $this->hasOne(detailDoctor::class, 'doctor');
    }


}
