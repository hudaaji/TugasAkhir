<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_user = \App\User::all();
        return view('user.user',['data_user' => $data_user]);
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
            return redirect('/');
        }else{
            return redirect('user')->with('sukses','Selamat Anda Telah Berhasil Membuat Data User Baru!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }
    public function search (Request $request)
    {
        $search = $request->get('cari');
        $data_user = \App\User::where('email','like','%'.$search.'%')->orwhere('nama','like','%'.$search.'%')
        ->orwhere('alamat','like','%'.$search.'%')->orwhere('telepon','like','%'.$search.'%')
        ->orwhere('kota','like','%'.$search.'%')->orwhere('role','like','%'.$search.'%')->get();
        // return $data_user;
        return view('user.user',['data_user' => $data_user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_user = \App\User::where ('id', $id)->firstOrFail();
        return view('user/edit')->with('data_user', $data_user);
    }
    public function edit_user($id)
    {
        $data_user = \App\User::where ('id', $id)->firstOrFail();
        return view('user/edit_user')->with('data_user', $data_user);
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

        $data_user = \App\User::where('id', $id)->firstOrFail();
        $data_user->email=$request->email;
        $data_user->nama=$request->nama;
        $data_user->alamat=$request->alamat;
        $data_user->telepon=$request->telepon;
        $data_user->kota=$request->kota;
        $data_user->save();
        return redirect('user')->with('berhasil','Update Data User Sukses!');

    }
    public function update_user(Request $request, $id)
    {

        $data_user = \App\User::where('id', $id)->firstOrFail();
        $data_user->email=$request->email;
        $data_user->nama=$request->nama;
        $data_user->alamat=$request->alamat;
        $data_user->telepon=$request->telepon;
        $data_user->kota=$request->kota;
        $data_user->save();
        return redirect('dashboard')->with('berhasil','Update Data User Sukses!');

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
    public function ResetPassword(Request $request){
        $code = rand(1000,9999);
        $user = User::where('email',$request->email)->first();
        $user->code = $code;
        $user->save();

        $details = [
            'title' => 'Reset Password',
            'body' => 'Kode Reset Password Anda : '.$code
        ];

        Mail::to($request->email)->send(new \App\Mail\ResetPassword($details));

        return view('konfirmasi-code');
    }
    public function konfirmasiCode(Request $request)
    {
        $otp= User::where('code',$request->code)->first();
        if($otp){
            return view('password-reset')->with('otp',$otp);
        }
        return 'Kode Salah';
    }
    public function PasswordBaru(Request $request)
    {
        $newP = User::where('email',$request->email)->first();
        $newP->password=bcrypt($request->password);
        $newP->save();

        return redirect('/');
    }
}
