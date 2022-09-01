<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Paket;
use App\Menu;
use App\Transaksi;
use App\MenuTambah;

class Pemesanan extends Model
{
    protected $table = 'pemesanan';
    protected $fillable = [
        'id_user','alamat_acara','tgl_pemesanan'.'jenis_pemesanan', 'paket','menu_tambahan','jumlah_undangan','harga'
    ];
    public function menu(){
        return $this->belongsTo(Menu::class,'menu_tambahan');
    }
    public function paket2(){
        return $this->belongsTo(Paket::class,'paket');
    }
    public function user(){
        return $this->belongsTo(User::class,'id_user');
    }
    public function transaksi(){
        return $this->hasOne(Transaksi::class,'pemesanan_id');
    }
    public function menutambah(){
        return $this->hasMany(MenuTambah::class);
    }
}
