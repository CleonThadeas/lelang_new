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

    // Sesuaikan nama field dengan nama kolom di DB
    $request->validate([
        'nama_barang'       => 'required',
        'tgl'               => 'required|date',
        'harga_awal'        => 'required|numeric',
        'deskripsi_barang'  => 'nullable',
        'foto_produk'       => 'nullable|image', 
    ]);
    
    // Ambil data dari form
    $nama_barang       = $request->input('nama_barang');
    $tgl               = $request->input('tgl');              // <= kolom "tgl"
    $harga_awal        = $request->input('harga_awal');
    $deskripsi_barang  = $request->input('deskripsi_barang'); // <= kolom "deskripsi_barang"

    // Handle upload foto
    $fotoPath = null;
    if ($request->hasFile('foto_produk') && $request->file('foto_produk')->isValid()) {
        $filename = time() . '_' . $request->file('foto_produk')->getClientOriginalName();
        $request->file('foto_produk')->move(public_path('uploads'), $filename);
        $fotoPath = 'uploads/' . $filename;
    }

    // Simpan ke database lewat Model Barang
    $barang = new Barang();
    $barang->nama_barang       = $nama_barang;
    $barang->tgl               = $tgl;               // pakai kolom "tgl"
    $barang->harga_awal        = $harga_awal;
    $barang->deskripsi_barang  = $deskripsi_barang;  // pakai kolom "deskripsi_barang"
    $barang->foto              = $fotoPath;          // kolom "foto"
    $barang->save();

    return redirect()->back()->with('success', 'Data barang berhasil disimpan!');
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
