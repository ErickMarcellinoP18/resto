<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Produk;
use App\Models\User;

class LoginController extends Controller
{
    public function login()
    {
        if(Auth::check()) {
            return redirect('/');
        } else {
            return view('login');
        }
    }

    public function actionLogin(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        if(Auth::attempt($data)){
            $user = Auth::user();
            $karyawan = User::all();
            $produk = Produk::where('status', 'aktif')
            ->limit(8)
            ->get();
            

            if($user->status==1) {
                return view('karyawan.index', compact('user', 'karyawan'))->with('success', 'Login berhasil!, halo '.$user->name);
            } else {
                Auth::logout();
                return redirect('/login')->with('alert', 'Akun anda nonaktif, kontak admin anda!');
            }
        } else {
            return redirect('/login')->with('alert', 'Email atau Password salah!');
        }
    }

    public function actionLogout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Anda berhasil logout');
    }

    public function homer()
    {
        return view('home');
    }
}
