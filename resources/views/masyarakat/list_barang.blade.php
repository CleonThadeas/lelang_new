html
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Barang Dibuka</title>
</head>
<body>
    <h1>Daftar Barang Lelang Dibuka</h1>
    @if(session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif
    <table border="1" cellpadding="5">
        <tr>
            <th>ID Lelang</th>
            <th>Nama Barang</th>
            <th>Harga Awal</th>
            <th>Tanggal Lelang</th>
            <th>Aksi</th>
        </tr>
        @foreach($lelangs as $l)
        <tr>
            <td>{{ $l->id_lelang }}</td>
            <td>{{ $l->barang->nama_barang }}</td>
            <td>{{ $l->barang->harga_awal }}</td>
            <td>{{ $l->tgl_lelang }}</td>
            <td>
                <a href="{{ route('tawar.form', $l->id_lelang) }}">Tawar</a>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
