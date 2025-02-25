<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Barang Dibuka</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #222831; color: white; font-family: 'Arial', sans-serif; }
        .container { margin-top: 30px; }
        .card { background-color: #393E46; color: white; border-radius: 10px; padding: 20px; }
        .table { color: white; border-radius: 10px; overflow: hidden; }
        .table thead { background-color: #00ADB5; color: white; }
        .table tbody tr:hover { background-color: #464E5F; }
        .btn-primary { background-color: #00ADB5; border: none; }
        .btn-primary:hover { background-color: #008C9E; }
        img { border-radius: 10px; object-fit: cover; }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Daftar Barang Lelang Dibuka</h2>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="card">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>ID Lelang</th>
                        <th>Nama Barang</th>
                        <th>Harga Awal</th>
                        <th>Tanggal Lelang</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($lelangs as $l)
                    <tr>
                        <td>
                            @if($l->barang->foto)
                                <img src="{{ asset($l->barang->foto) }}" alt="Foto Barang" width="100" height="80">
                            @else
                                Tidak ada foto
                            @endif
                        </td>
                        <td>{{ $l->id_lelang }}</td>
                        <td>{{ $l->barang->nama_barang }}</td>
                        <td>Rp {{ number_format($l->barang->harga_awal, 0, ',', '.') }}</td>
                        <td>{{ $l->tgl_lelang }}</td>
                        <td>
                            <a href="{{ route('tawar.form', $l->id_lelang) }}" class="btn btn-primary btn-sm">Tawar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>