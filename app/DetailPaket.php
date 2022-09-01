<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Paket;
use \App\Menu;

class DetailPaket extends Model
{
    protected $table = 'detail_paket';
    protected $fillables = ['id_menu','id_paket'];

    public function menu(){
        return $this->belongsTo(Menu::class,'id_menu');
    }

    public function paket(){
        return $this->belongsTo(Paket::class,'id_paket');
    }
}

// class DetailPaket extends Model
// {
//     protected $table = 'detail_paket';
//     public function paket(){
//         return $this->belongsTo(Paket::class,'id_paket');
//     }
//     public function menu(){
//         return $this->belongsTo(Menu::class,'id_menu');
//     }
// }
