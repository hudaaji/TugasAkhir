<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paket;
use App\Menu;
use App\DetailPaket;
use App\Pemesanan;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //waktu skrg
        date_default_timezone_set("Asia/Singapore");
        $date = date("Y-m-d");

        //max pemesanan
        $tanggal = Pemesanan::where('tgl_pemesanan',$date)->sum('jumlah_undangan');

        $data_menu = Menu::all();
        if(auth()->user()->role=="admin"){
            return view('menu.menu',['data_menu' => $data_menu]);
        }else{
        $data_paket = Paket::all();
        $data_menu = Menu::all();
        $detail_paket = DetailPaket::all();
            return view('menu.menu-user',['data_menu' => $data_menu, 'data_paket'=>$data_paket, 'detail_paket'=>$detail_paket, 'tanggal'=>$tanggal]);
        }
    }
    public function utama()
    {
        //waktu skrg
        date_default_timezone_set("Asia/Singapore");
        $date = date("Y-m-d");

        //max pemesanan
        $tanggal = Pemesanan::where('tgl_pemesanan',$date)->sum('jumlah_undangan');

        $data_menu = Menu::all();

        $data_paket = Paket::all();
        $data_menu = Menu::all();
        $detail_paket = DetailPaket::all();
            return view('menu-utama',['data_menu' => $data_menu, 'data_paket'=>$data_paket, 'detail_paket'=>$detail_paket, 'tanggal'=>$tanggal]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request['harga_menu'] = filter_var($request->harga_menu, FILTER_SANITIZE_NUMBER_INT);

        $data_menu = new \App\Menu();
        $data_menu->nama_menu = $request->nama_menu;
        $data_menu->harga_menu = $request->harga_menu;
        if($request->hasFile('gambar_menu')){
            $request->file('gambar_menu')->move('images/',$request->file('gambar_menu')->getClientOriginalName());
            $data_menu->gambar_menu = $request->file('gambar_menu')->getClientOriginalName();
        }
        $data_menu->save();
        return redirect('menu')->with('store','Selamat Anda Telah Berhasil Membuat Menu Baru!');
    }

    public function search (Request $request)
    {
        $search = $request->get('cari');
        $data_menu = \App\Menu::where('nama_menu','like','%'.$search.'%')->get();
        // return $data_user;
        return view('menu.menu',['data_menu' => $data_menu]);
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
        $data_menu = \App\Menu::where ('id', $id)->firstOrFail();
        return view('menu/edit')->with('data_menu', $data_menu);
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
        $request['harga_menu'] = filter_var($request->harga_menu, FILTER_SANITIZE_NUMBER_INT);

        $data_menu = \App\Menu::where('id', $id)->firstOrFail();
        $data_menu->nama_menu = $request->nama_menu;
        $data_menu->harga_menu = $request->harga_menu;
        if($request->hasFile('gambar_menu')){
            $request->file('gambar_menu')->move('images/',$request->file('gambar_menu')->getClientOriginalName());
            $data_menu->gambar_menu = $request->file('gambar_menu')->getClientOriginalName();

        }
        $data_menu->save();
        return redirect('menu')->with('update','Update Menu Berhasil!');
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
