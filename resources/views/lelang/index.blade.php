    html
    <!DOCTYPE html>
    <html>
    <head>
        <title>Kelola Lelang</title>
    </head>
    <body>
        <h1>Kelola Lelang (Admin/Petugas)</h1>

        <h3>Buka Lelang Baru</h3>
        <form method="POST" action="{{ route('lelang.store') }}">
            @csrf
            <label>Pilih Barang</label><br>
            <select name="id_barang" required>
                <option value="">--Pilih--</option>
                @foreach($barangs as $brg)
                <option value="{{ $brg->id_barang }}">{{ $brg->nama_barang }}</option>
                @endforeach
            </select><br>

            <label>Tanggal Lelang (YYYY-MM-DD)</label><br>
            <input type="date" name="tgl_lelang" required><br><br>

            <button type="submit">Buka Lelang</button>
        </form>

        <hr>
        <h3>Data Lelang</h3>
        <table border="1" cellpadding="5">
            <tr>
                <th>Foto</th>
                <th>ID Lelang</th>
                <th>Nama Barang</th>
                <th>Tanggal Lelang</th>
                <th>Harga Awal</th>
                <th>Harga Akhir</th>
                <th>Pemenang</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            @foreach($lelangs as $l)
            <tr>
                <!-- Menampilkan foto barang -->
            <td>
                @if($l->barang->foto)
                    <img src="{{ asset($l->barang->foto) }}" alt="Foto Barang" width="100">
                @else
                    Tidak ada foto
                @endif
            </td>
                <td>{{ $l->id_lelang }}</td>
                <td>{{ $l->barang->nama_barang }}</td>
                <td>{{ $l->tgl_lelang }}</td>
                <td>{{ $l->barang->harga_awal }}</td>
                <td>{{ $l->harga_akhir }}</td>
                <td>{{ $l->masyarakat ? $l->masyarakat->nama_lengkap : '-' }}</td>
                <td>{{ $l->status }}</td>
                <td>
                    @if($l->status == 'dibuka')
                        <a href="{{ route('lelang.close', $l->id_lelang) }}"
                        onclick="return confirm('Yakin menutup lelang ini?')">Tutup Lelang</a>
                    @else
                        (Ditutup)
                    @endif
                </td>
            </tr>
            @endforeach
        </table>
    </body>
    </html>

