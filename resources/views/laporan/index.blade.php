html
<!DOCTYPE html>
<html>
<head>
    <title>Laporan Lelang</title>
</head>
<body>
    <h1>Laporan Lelang (Ditutup)</h1>
    <table border="1" cellpadding="5">
        <tr>
            <th>ID Lelang</th>
            <th>Nama Barang</th>
            <th>Tanggal Lelang</th>
            <th>Harga Awal</th>
            <th>Harga Akhir</th>
            <th>Pemenang</th>
        </tr>
        @foreach($lelangs as $l)
        <tr>
            <td>{{ $l->id_lelang }}</td>
            <td>{{ $l->barang->nama_barang }}</td>
            <td>{{ $l->tgl_lelang }}</td>
            <td>{{ $l->barang->harga_awal }}</td>
            <td>{{ $l->harga_akhir }}</td>
            <td>{{ $l->masyarakat ? $l->masyarakat->nama_lengkap : '-' }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
