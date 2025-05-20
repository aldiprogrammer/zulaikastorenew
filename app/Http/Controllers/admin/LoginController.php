<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function index()
    {

        return view('admin.login');
    }

    function login(Request $request)
    {

        $credential = $request->only('username', 'password');
        if (Auth::guard('pengguna')->attempt($credential)) {
            $request->session()->regenerate();
            session([
                'id' => Auth::guard('pengguna')->user()->id,
                'username' => Auth::guard('pengguna')->user()->username,
                'level' => Auth::guard('pengguna')->user()->level
            ]);
            return redirect()->intended('/dashboard');
        }

        return back()->with('error', 'Username atau password salah');
    }

    function logout(Request $request)
    {

        Auth::guard('pengguna')->logout();

        // Hapus session
        $request->session()->forget(['id', 'level', 'username']);
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
