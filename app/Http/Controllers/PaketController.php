<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use \App\Menu;
use \App\Paket;
use \App\DetailPaket;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$data_paket = Paket::join('users','paket.id_user','=','users.id')->where('users.role','admin')->get();
        $data_menu = Menu::all();
        $data_paket = Paket::all();

        $detail_paket = DetailPaket::join('menu','detail_paket.id_menu','=','menu.id')->get();

        if (auth()->user()->role != 'admin') {

            $paket_user = Paket::where('id_user',auth()->user()->id)->get();
            return view('paket.paket',['data_paket' => $data_paket, 'detail_paket'=>$detail_paket, 'data_menu'=>$data_menu, 'paket_user'=>$paket_user]);

        }
        //return $detail_paket;
        // return $data_paket;

        return view('paket.paket',['data_paket' => $data_paket, 'detail_paket'=>$detail_paket, 'data_menu'=>$data_menu]);

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

        $data_paket = new \App\Paket();
        $data_paket->nama_paket = $request->nama_paket;
        $data_paket -> id_user = auth()->user()->id;

        $data_paket->save();
        //input detail paket
        $data_paket = \App\Paket::latest('id')->first();
        $lastid = $data_paket -> id;
        foreach ($request -> menu as $id_menu){

            $detail_paket = new \App\DetailPaket();
            $detail_paket -> id_menu = $id_menu;
            $detail_paket -> id_paket = $lastid;
            $detail_paket -> save();

        }
        $harga_paket = DetailPaket::where('id_paket', $lastid)->join('menu','detail_paket.id_menu','=','menu.id')->sum('harga_menu');
        $harga_paket = $harga_paket - ($harga_paket*10/100);

        $data_paket = \App\Paket::where('id',$lastid)->firstOrFail();
        $data_paket->harga_paket =  $harga_paket;
        $data_paket->save();

        return redirect('menu_paket')->with('store','Selamat Anda Telah Berhasil Membuat Menu Paket Baru!');
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

    public function search (Request $request)
    {
        $search = $request->get('cari');
        $data_menu = Menu::all();
        $detail_paket = DetailPaket::join('menu','detail_paket.id_menu','=','menu.id')->get();
        $data_paket = Paket::join('users','paket.id_user','=','users.id')->where('users.role','admin')->where('nama_paket','like','%'.$search.'%')->get();
        if (auth()->user()->role != 'admin') {

            $paket_user = Paket::where('id_user',auth()->user()->id)->where('nama_paket','like','%'.$search.'%')->get();
            return view('paket.paket',['data_paket' => $data_paket, 'detail_paket'=>$detail_paket, 'data_menu'=>$data_menu, 'paket_user'=>$paket_user]);

        }
        // return $data_user;
        return view('paket.paket',['data_paket' => $data_paket, 'data_menu' => $data_menu, 'detail_paket'=>$detail_paket]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_menu = \App\Menu::all();

        $data_paket = Paket::where ('id', $id)->firstOrFail();
        $detail_paket = DetailPaket::where('id_paket',$id)->get();

      //  return $detail_paket;
        return view('paket/edit')->with(['data_paket' => $data_paket, 'data_menu'=>$data_menu , 'detail_paket' => $detail_paket]);

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
        $data_paket = \App\Paket::where('id',$id)->firstOrFail();
        $data_paket->nama_paket = $request->nama_paket;

        $data_paket->save();
        //input detail paket
        $detail_paket = DetailPaket::where('id_paket',$id)->delete();
        //$detail_paket -> delete();

        foreach ($request -> menu as $id_menu){

            $detail_paket = new \App\DetailPaket();
            $detail_paket -> id_menu = $id_menu;
            $detail_paket -> id_paket = $id;
            $detail_paket -> save();

        }
        $harga_paket = DetailPaket::where('id_paket', $id)->join('menu','detail_paket.id_menu','=','menu.id')->sum('harga_menu');
        $harga_paket = $harga_paket - ($harga_paket*10/100);

        $data_paket = \App\Paket::where('id',$id)->firstOrFail();
        $data_paket->harga_paket =  $harga_paket;
        $data_paket->save();
        return redirect('menu_paket')->with('update','Update Menu Paket Telah Berhasil!');
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
