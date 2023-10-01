<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function index(Request $request)
    {
        return view('login.index');
    }

    function processLogin(Request $request)
    {
        Session::put('email', $request->input('email'));

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi'
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($infologin)) {
            return redirect('identitas')->with('success', 'Berhasil login');
        } else {
            return redirect('login')
                ->withErrors([
                    'loginError' => 'email dan password yang dimasukkan tidak sesuai. Pastikan Anda memasukkan informasi yang benar.'
                ]);
        }
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();

        return redirect('login')->with('success', 'Berhasil logout');
    }
}
