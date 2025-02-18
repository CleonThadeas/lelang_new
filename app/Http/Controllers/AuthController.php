<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petugas;
use App\Models\Masyarakat;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // Tampilkan form login
    public function showLoginForm()
    {
        return view('auth.login'); // Kembali ke halaman login
    }

    public function loginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $username = $request->username;
        $password = $request->password;

        // Cek di tb_petugas
        $petugas = Petugas::where('username', $username)->first();
        if ($petugas) {
            if (Hash::check($password, $petugas->password)) {
                // Login berhasil
                Session::put('user_id', $petugas->id_petugas);
                Session::put('username', $petugas->username);
                Session::put('level', $petugas->id_level); // 1=admin, 2=petugas
                return redirect()->route('dashboard');
            } else {
                return back()->withErrors(['password' => 'Password salah!']);
            }
        } else {
            // Cek di tb_masyarakat
            $masyarakat = Masyarakat::where('username', $username)->first();
            if ($masyarakat) {
                if (Hash::check($password, $masyarakat->password)) {
                    Session::put('user_id', $masyarakat->id_user);
                    Session::put('username', $masyarakat->username);
                    Session::put('level', 3); // 3=masyarakat
                    return redirect()->route('dashboard');
                } else {
                    return back()->withErrors(['password' => 'Password salah!']);
                }
            } else {
                return back()->withErrors(['username' => 'Username tidak ditemukan!']);
            }
        }
    }

    // Tampilkan form register (khusus masyarakat)
    public function registerForm()
    {
        return view('auth.register');
    }

    // Proses register masyarakat
    public function register(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'username' => 'required|unique:tb_masyarakat,username',
            'password' => 'required',
            'telp' => 'required',
        ]);

        $masyarakat = new Masyarakat();
        $masyarakat->nama_lengkap = $request->nama_lengkap;
        $masyarakat->username = $request->username;
        $masyarakat->password = Hash::make($request->password);
        $masyarakat->telp = $request->telp;
        $masyarakat->save();

        return redirect()->route('login.form')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    // Logout
    public function logout()
    {
        Session::flush();
        return redirect()->route('login.form');
    }
}