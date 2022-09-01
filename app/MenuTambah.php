<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Menu;
use App\Pemesanan;

class MenuTambah extends Model
{
    protected $table = 'menu_tambahan';
    protected $fillables = ['pemesanan_id','menu_id'];

    public function menu(){
        return $this->belongsTo(Menu::class);
    }
    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class,'id');
    }
}
