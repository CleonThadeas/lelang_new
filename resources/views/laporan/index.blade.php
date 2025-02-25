<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Lelang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #222831; color: white; font-family: 'Arial', sans-serif; }
        .container { margin-top: 30px; }
        .card { background-color: #393E46; color: white; border-radius: 10px; padding: 20px; }
        .table { color: white; }
        .table thead { background-color: #00ADB5; }
        .table img { border-radius: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Laporan Lelang (Ditutup)</h2>
        <div class="card">
            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>ID Lelang</th>
                            <th>Nama Barang</th>
                            <th>Tanggal Lelang</th>
                            <th>Harga Awal</th>
                            <th>Harga Akhir</th>
                            <th>Pemenang</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lelangs as $l)
                        <tr>
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
                            <td>Rp{{ number_format($l->barang->harga_awal, 0, ',', '.') }}</td>
                            <td>Rp{{ number_format($l->harga_akhir, 0, ',', '.') }}</td>
                            <td>{{ $l->masyarakat ? $l->masyarakat->nama_lengkap : '-' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
