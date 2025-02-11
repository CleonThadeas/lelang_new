<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class KelolaPetugasController extends Controller
{
    public function index()
    {
        // Pastikan level=1 (admin)
        if (Session::get('level') != 1) {
            return redirect()->route('dashboard');
        }

        $petugas = Petugas::with('level')->get();
        $levels = Level::whereIn('id_level', [1,2])->get(); // hanya admin/petugas
        return view('petugas.index', compact('petugas','levels'));
    }

    public function store(Request $request)
    {
        if (Session::get('level') != 1) {
            return redirect()->route('dashboard');
        }

        $request->validate([
            'nama_petugas' => 'required',
            'username' => 'required|unique:tb_petugas,username',
            'password' => 'required',
            'id_level' => 'required|in:1,2',
        ]);

        Petugas::create([
            'nama_petugas' => $request->nama_petugas,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'id_level' => $request->id_level
        ]);

        return redirect()->route('petugas.index');
    }

    public function destroy($id)
    {
        if (Session::get('level') != 1) {
            return redirect()->route('dashboard');
        }

        Petugas::where('id_petugas', $id)->delete();
        return redirect()->route('petugas.index');
    }
}
