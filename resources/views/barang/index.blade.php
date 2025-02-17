html
<!DOCTYPE html>
<html>
<head>
    <title>Kelola Barang</title>
</head>
<body>
    <h1>Kelola Barang (Admin/Petugas)</h1>
    <form method="POST" action="{{ route('barang.store') }}">
        @csrf
        <label>Nama Barang</label><br>
        <input type="text" name="nama_barang" required><br>

        <label>Tanggal (YYYY-MM-DD)</label><br>
        <input type="date" name="tgl" required><br>

        <label>Harga Awal</label><br>
        <input type="number" name="harga_awal" required><br>

        <label>Deskripsi</label><br>
        <textarea name="deskripsi_barang"></textarea><br><br>

        <button type="submit">Tambah</button>
    </form>
    <hr>
    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Nama Barang</th>
            <th>Tanggal</th>
            <th>Harga Awal</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
        @foreach($barangs as $b)
        <tr>
            <td>{{ $b->id_barang }}</td>
            <td>{{ $b->nama_barang }}</td>
            <td>{{ $b->tgl }}</td>
            <td>{{ $b->harga_awal }}</td>
            <td>{{ $b->deskripsi_barang }}</td>
            <td>
                <a href="{{ route('barang.destroy',$b->id_barang) }}"
                   onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
