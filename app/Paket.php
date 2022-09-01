<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Menu;
use \App\DetailPaket;
use \App\Pemesanan;
use \App\User;

//$menu = Menu::find(1);


// class Paket extends Model
// {


//     protected $table = 'paket';
//     protected $fillables = ['nama_paket','harga_paket'];



// }

class Paket extends Model
{
    protected $table = 'paket';
    protected $fillables = ['nama_paket','harga_paket'];

    public function menu(){
        return $this->belongsToMany(Menu::class);
    }

    public function detail_paket(){
        return $this->hasMany(DetailPaket::class,'id_paket');
    }
    public function pemesanan(){
        return $this->hasMany(Pemesanan::class);
    }
    public function user(){
        return $this->belongsTo(User::class,'id_user');
    }

}
