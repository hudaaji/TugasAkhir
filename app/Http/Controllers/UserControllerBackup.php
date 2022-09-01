<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UserControllerBackup extends Controller
{
    public function index ()
    {
        $data_user = \App\User::all();
        return view('user.user',['data_user' => $data_user]);
    }
    public function create (Request $request)
    {
        $data_user = new \App\User();
        $data_user->email=$request->email;
        $data_user->nama=$request->nama;
        $data_user->alamat=$request->alamat;
        $data_user->telepon=$request->telepon;
        $data_user->kota=$request->kota;
        $data_user->password=bcrypt($request->password);
        if (!$request->has('role')){
            $data_user->role='user';
        }else{
            $data_user->role=$request->role;
        }


        $data_user->save();
        if (!$request->has('role')){
            return redirect('/')->with('sukses','Selamat Anda Telah Berhasil Membuat Akun Baru!');
        }else{
            return redirect('/')->with('gagal','Gagal Membuat Akun Baru!');
        }
    }
    public function edit ($id){
        $c = \App\User::where ('id', $id)->firstOrFail();
        return view('user/edit')->with('c', $c);
    }
}
