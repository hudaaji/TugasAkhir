<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function postlogin (Request $request){
        //dd($request->all());
        if (Auth::attempt(['email' => $request -> email, 'password' => $request -> password])) {
            if (auth()->user()->role == 'admin') {

                return redirect()->route('dashboard');

            }else{

                return redirect()->route('menu');

            }

        }else{
            return redirect('/')->with('gagal','Email atau Password Salah!');
        }

    }
    public function logout (Request $request){
        Auth::logout();
        session::flush();
        return redirect('/');
    }
    public function reset(){
        return view('reset-password');
    }

}
