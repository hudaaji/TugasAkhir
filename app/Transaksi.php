<?php

namespace App;
use App\Pemesanan;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    public function pemesanan(){
        return $this->belongsTo(Pemesanan::class,'pemesanan_id','id');
    }
    public function menu(){
        return $this->hasMany(Menu::class);
    }
}
