<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Paket;
use App\Pemesanan;
use App\User;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        date_default_timezone_set("Asia/Singapore");
        $date = date("Y-m-d");
        $besok = date("Y-m-d", strtotime($date.'+1 day'));
        $lusa = date("Y-m-d", strtotime($date.'+2 day'));

        $pemesanan = Pemesanan::where('keterangan',2)->where('tgl_pemesanan',$date)->get();

        $pemesanan_besok = Pemesanan::where('keterangan',2)->where('tgl_pemesanan',$besok )->get();

        $pemesanan_lusa = Pemesanan::where('keterangan',2)->where('tgl_pemesanan',$lusa )->get();
      //  return $pemesanan;
        return view('dashboard', compact('pemesanan','pemesanan_besok','pemesanan_lusa'));
    }

    public function halamanmenu()
    {
        return view('menu.menu');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function halamanpaket()
    {
        return view('paket.paket');
    }

    public function halamanpemesanan()
    {
        return view('pemesanan.pemesanan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
