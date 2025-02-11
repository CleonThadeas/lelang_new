<?php

namespace App\Http\Controllers;

use App\Models\Lelang;
use App\Models\HistoryLelang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TawarController extends Controller
{
    public function form($id_lelang)
    {
        $level = Session::get('level');
        if ($level != 3) {
            return redirect()->route('dashboard');
        }

        $lelang = Lelang::with('barang')->find($id_lelang);
        if (!$lelang) {
            return abort(404, 'Lelang tidak ditemukan');
        }

        return view('masyarakat.tawar', compact('lelang'));
    }

    public function store(Request $request, $id_lelang)
    {
        $level = Session::get('level');
        if ($level != 3) {
            return redirect()->route('dashboard');
        }

        $request->validate([
            'penawaran_harga' => 'required|numeric|min:1',
        ]);

        $id_user = Session::get('user_id');

        // Simpan penawaran
        HistoryLelang::create([
            'id_lelang' => $id_lelang,
            'id_user' => $id_user,
            'penawaran_harga' => $request->penawaran_harga,
        ]);

        return redirect()->route('list.barang')->with('success','Penawaran berhasil!');
    }
}
    