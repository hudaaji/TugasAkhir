<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Paket;
use \App\DetailPaket;
use \App\Pemesanan;
use App\MenuTambah;

$paket = Paket::find(1);



// class Menu extends Model
// {

//     protected $table = 'menu';
//     protected $fillables = ['nama_menu','harga_menu','gambar_menu'];


//     public function detail_paket(){

//     }
// }

class Menu extends Model
{
    protected $table = 'menu';
    protected $fillables = ['nama_menu','harga_menu','gambar_menu'];

    public function paket(){
        return $this->belongsToMany(Paket::class);
    }

    public function detail_paket(){
        return $this->hasMany(DetailPaket::class);
    }
    public function pemesanan(){
        return $this->hasMany(Pemesanan::class);
    }
    public function transaksi(){
        return $this->belongsToMany(Transaksi::class);
    }
    public function menutambah(){
        return $this->hasMany(MenuTambah::class);
    }

}
