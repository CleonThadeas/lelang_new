<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KelolaBarangController extends Controller
{
    public function index()
    {
        $level = Session::get('level');
        if (!in_array($level, [1,2])) {
            return redirect()->route('dashboard');
        }

        $barangs = Barang::orderBy('id_barang','DESC')->get();
        return view('barang.index', compact('barangs'));
    }

    public function store(Request $request)
    {
        $level = Session::get('level');
        if (!in_array($level, [1,2])) {
            return redirect()->route('dashboard');
        }

        $request->validate([
            'nama_barang' => 'required',
            'tgl' => 'required|date',
            'harga_awal' => 'required|numeric',
            'deskripsi_barang' => 'nullable',
        ]);

        Barang::create($request->all());
        return redirect()->route('barang.index');
    }

    public function destroy($id)
    {
        $level = Session::get('level');
        if (!in_array($level, [1,2])) {
            return redirect()->route('dashboard');
        }

        Barang::where('id_barang', $id)->delete();
        return redirect()->route('barang.index');
    }
}
