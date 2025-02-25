<!DOCTYPE html>
<html>
<head>
    <title>Kelola Barang</title>
</head>
<body>
    <h1>Kelola Barang (Admin/Petugas)</h1>

    <!-- Perbaikan #1: Hilangkan salah satu 'action' agar tidak duplikasi.
         Gunakan route yang benar (misalnya 'kelola.barang.store'). -->
    <form action="{{ route('kelola.barang.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Nama Barang</label><br>
        <input type="text" name="nama_barang" required><br>

        <label>Tanggal (YYYY-MM-DD)</label><br>
        <input type="date" name="tgl" required><br>

        <label>Harga Awal</label><br>
        <input type="number" name="harga_awal" required><br>

        <label>Deskripsi</label><br>
        <textarea name="deskripsi_barang"></textarea><br><br>

        <label>Foto Produk:</label>
        <input type="file" name="foto_produk" accept="image/*" required>

        <hr>
        <button type="submit">Tambah</button>
    </form>
    <hr>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Nama Barang</th>
                <th>Tanggal</th>
                <th>Harga Awal</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <!-- Perbaikan #2: Gunakan variabel $barang di dalam forelse, 
                 jangan gunakan $b -->
            @forelse($barangs as $barang)
            <tr>
                <td>
                    @if($barang->foto)
                        <img src="{{ asset($barang->foto) }}" alt="Foto Barang" width="100">
                    @else
                        Tidak ada foto
                    @endif
                </td>
                <td>{{ $barang->nama_barang }}</td>
                <td>{{ $barang->tgl }}</td>
                <td>{{ $barang->harga_awal }}</td>
                <td>{{ $barang->deskripsi_barang }}</td>
                <td>
                    <!-- Perbaikan #3: Gunakan $barang->id_barang -->
                    <a href="{{ route('barang.destroy', $barang->id_barang) }}"
                       onclick="return confirm('Yakin ingin menghapus?')">
                       Hapus
                    </a>
                </td>
            </tr>
            @empty
            <!-- Perbaikan #4: Sesuaikan colspan dengan jumlah kolom (6) -->
            <tr>
                <td colspan="6">Tidak ada data barang.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
