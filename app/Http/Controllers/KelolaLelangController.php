<?php

namespace App\Http\Controllers;

use App\Models\Lelang;
use App\Models\Barang;
use App\Models\HistoryLelang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KelolaLelangController extends Controller
{
    public function index()
    {
        $level = Session::get('level');
        if (!in_array($level, [1,2])) {
            return redirect()->route('dashboard');
        }

        $lelangs = Lelang::with(['barang','masyarakat','petugas'])
                    ->orderBy('id_lelang','DESC')->get();
        $barangs = Barang::all();
        return view('lelang.index', compact('lelangs','barangs'));
    }

    public function store(Request $request)
    {
        $level = Session::get('level');
        if (!in_array($level, [1,2])) {
            return redirect()->route('dashboard');
        }

        $request->validate([
            'id_barang' => 'required',
            'tgl_lelang' => 'required|date',
        ]);

        // id_petugas diambil dari session user_id (karena petugas = session user)
        $id_petugas = Session::get('user_id');

        Lelang::create([
            'id_barang' => $request->id_barang,
            'tgl_lelang' => $request->tgl_lelang,
            'id_petugas' => $id_petugas,
            'status' => 'dibuka'
        ]);

        return redirect()->route('lelang.index');
    }

    public function close($id_lelang)
    {
        $level = Session::get('level');
        if (!in_array($level, [1,2])) {
            return redirect()->route('dashboard');
        }

        // Cari penawaran tertinggi
        $highest = HistoryLelang::where('id_lelang',$id_lelang)
                    ->orderBy('penawaran_harga','DESC')->first();

        $harga_akhir = $highest ? $highest->penawaran_harga : 0;
        $pemenang    = $highest ? $highest->id_user : null;

        // Update status di tb_lelang
        $lelang = Lelang::find($id_lelang);
        $lelang->update([
            'status' => 'ditutup',
            'harga_akhir' => $harga_akhir,
            'id_user' => $pemenang,
        ]);

        return redirect()->route('lelang.index');
    }
}
