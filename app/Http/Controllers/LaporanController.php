<?php

namespace App\Http\Controllers;

use App\Models\Lelang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LaporanController extends Controller
{
    public function index()
    {
        $level = Session::get('level');
        if (!in_array($level, [1,2])) {
            return redirect()->route('dashboard');
        }

        // Menampilkan lelang yang sudah ditutup
        $lelangs = Lelang::with(['barang','masyarakat'])
                    ->where('status','ditutup')
                    ->orderBy('id_lelang','DESC')->get();

        return view('laporan.index', compact('lelangs'));
    }
}
