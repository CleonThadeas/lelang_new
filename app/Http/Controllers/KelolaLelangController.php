<?php

namespace App\Http\Controllers;

use App\Models\Lelang;
use App\Models\Barang;
use App\Models\HistoryLelang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Events\BidPlaced;

class KelolaLelangController extends Controller
{
    /**
     * Menampilkan daftar lelang dan form pembukaan lelang
     */
    public function index()
    {
        $level = Session::get('level');
        if (!in_array($level, [1,2])) {
            return redirect()->route('dashboard');
        }

        // Ambil data lelang dengan relasi
        $lelangs = Lelang::with(['barang','masyarakat','petugas'])
                    ->orderBy('id_lelang','DESC')
                    ->get();

        // Ambil data barang (untuk dipilih saat membuka lelang)
        $barangs = Barang::all();

        return view('lelang.index', compact('lelangs','barangs'));
    }

    /**
     * Membuka lelang baru (menyimpan data ke tabel lelang)
     */
    public function store(Request $request)
    {
        $level = Session::get('level');
        if (!in_array($level, [1,2])) {
            return redirect()->route('dashboard');
        }

        $request->validate([
            'id_barang'  => 'required',
            'tgl_lelang' => 'required|date',
        ]);

        // id_petugas diambil dari session (petugas yang login)
        $id_petugas = Session::get('user_id');

        // Buat data lelang baru
        Lelang::create([
            'id_barang'  => $request->id_barang,
            'tgl_lelang' => $request->tgl_lelang,
            'id_petugas' => $id_petugas,
            'status'     => 'dibuka'
        ]);

        return redirect()->route('lelang.index');

        
    }

    /**
     * Menangani penutupan lelang (status = 'ditutup')
     * dan menentukan pemenang (penawar tertinggi)
     */
    public function close($id_lelang)
    {
        $level = Session::get('level');
        if (!in_array($level, [1,2])) {
            return redirect()->route('dashboard');
        }

        // Cari penawaran tertinggi untuk lelang ini
        $highest = HistoryLelang::where('id_lelang', $id_lelang)
                    ->orderBy('penawaran_harga','DESC')
                    ->first();

        $harga_akhir = $highest ? $highest->penawaran_harga : 0;
        $pemenang    = $highest ? $highest->id_user : null;

        // Update status dan pemenang di tabel lelang
        $lelang = Lelang::findOrFail($id_lelang);
        $lelang->update([
            'status'      => 'ditutup',
            'harga_akhir' => $harga_akhir,
            'id_user'     => $pemenang,
        ]);

        return redirect()->route('lelang.index');
    }

    /**
     * Menyimpan penawaran (bid) secara real-time
     * dan memanggil event BidPlaced agar admin/petugas melihat live
     */
    public function storePenawaran(Request $request, $id_lelang)
    {
        $request->validate([
            'penawaran_harga' => 'required|numeric|min:1'
        ]);

        // Simpan penawaran ke tabel history_lelang
        $history = new HistoryLelang();
        $history->id_lelang       = $id_lelang;
        // Jika pakai Laravel Auth:
        $history->id_user         = Auth::id(); 
        // atau pakai session manual:
        // $history->id_user      = Session::get('user_id');
        $history->penawaran_harga = $request->penawaran_harga;
        $history->save();

        // Panggil event broadcast (untuk live lelang)
        event(new BidPlaced($history));

        // Kembalikan respon (redirect atau JSON)
        return redirect()->back()->with('success', 'Penawaran berhasil disimpan!');
    }

    public function adminLiveLelang()
{
    // Ambil riwayat penawaran
    $penawaran = HistoryLelang::orderBy('created_at','asc')->get();


    // Tampilkan view
    return view('live_lelang_admin', compact('penawaran'));
}

}
