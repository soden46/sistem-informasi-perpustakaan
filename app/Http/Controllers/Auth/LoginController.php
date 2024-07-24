<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.choose_login');
    }
    // Tampilkan formulir login admin
    public function showAdminLoginForm()
    {
        return view('auth.admin_login');
    }

    // Proses login admin
    public function authenticate(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            if (auth()->user()->role == 'admin') {
                return redirect()->route('admin.dashboard');
            } else if (auth()->user()->role == 'guru') {
                return redirect()->route('guru');
            }
        } else {
            return redirect()->route('login')
                ->with('error', 'Email-Address And Password Are Wrong.');
        }
    }


    // Tampilkan formulir login guru
    public function showGuruLoginForm()
    {
        return view('auth.guru_login');
    }

    // Proses login guru
    public function guruLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 'guru'])) {
            return redirect()->intended('/guru-dashboard');
        }

        return back()->withErrors(['email' => 'Email atau password salah.']);
    }

    // Tampilkan formulir login siswa
    public function showSiswaLoginForm()
    {
        return view('auth.siswa_login');
    }

    // Proses login siswa
    public function siswaLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 'siswa'])) {
            return redirect()->intended('/siswa-dashboard');
        }

        return back()->withErrors(['email' => 'Email atau password salah.']);
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
