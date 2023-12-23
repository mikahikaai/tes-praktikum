<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function index()
    {
        return view('login');
    }

    /**
     * Show the form for creating a new resource.
     */
    function login(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);

        $login_type = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (
            Auth::attempt([
                $login_type => $request->login,
                'password' => $request->password,
            ])
        ) {
            return $this->usercheck();
        } else {
            dd('Gagal');
        }
    }

    function admin()
    {
        return view('home');
    }

    function pelanggan()
    {
        return view('home');
    }

    function owner()
    {
        return view('home');
    }

    function usercheck()
    {
        if (Auth::user()->role == 'admin') {
            return redirect('admin')->with('login_sukses','Login berhasil!');
        } elseif (Auth::user()->role == 'owner') {
            return redirect('owner');
        } elseif (Auth::user()->role == 'pelanggan') {
            return redirect('pelanggan');
        }
    }

    function redirect()
    {
        return redirect('login');
    }

    function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
