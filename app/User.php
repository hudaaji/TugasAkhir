<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Pemesanan;

class User extends Authenticatable
{
    use Notifiable;

    protected $guard = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email','nama','alamat','telepon'.'kota', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function menu(){
        return $this->hasMany(Menu::class);

    }
    public function pemesanan(){
        return $this->hasMany(Pemesanan::class,'id_user');
    }
    public function paket(){
        return $this->hasMany(Paket::class);
    }
}


