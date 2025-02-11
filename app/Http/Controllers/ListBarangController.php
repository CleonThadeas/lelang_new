<?php

namespace App\Http\Controllers;

use App\Models\Lelang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ListBarangController extends Controller
{
    public function index()
    {
        $level = Session::get('level');
        if ($level != 3) {
            return redirect()->route('dashboard');
        }

        $lelangs = Lelang::with('barang')
                    ->where('status','dibuka')
                    ->orderBy('id_lelang','DESC')
                    ->get();

        return view('masyarakat.list_barang', compact('lelangs'));
    }
}
