<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Lelang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #222831; color: #EEEEEE; font-family: Arial, sans-serif; }
        .container { margin-top: 30px; }
        .card { background-color: #393E46; color: white; border-radius: 10px; padding: 20px; }
        .table { color: white; }
        .btn-primary { background-color: #00ADB5; border: none; }
        .btn-danger { background-color: #dc3545; }
        .table thead { background-color: #00ADB5; color: black; }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Kelola Lelang (Admin/Petugas)</h2>
        
        <div class="card mb-4">
            <h4>Buka Lelang Baru</h4>
            <form method="POST" action="{{ route('lelang.store') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Pilih Barang</label>
                    <select name="id_barang" class="form-select" required>
                        <option value="">--Pilih--</option>
                        @foreach($barangs as $brg)
                        <option value="{{ $brg->id_barang }}">{{ $brg->nama_barang }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal Lelang</label>
                    <input type="date" name="tgl_lelang" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Buka Lelang</button>
            </form>
        </div>
        
        <h4>Data Lelang</h4>
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>ID Lelang</th>
                    <th>Nama Barang</th>
                    <th>Tanggal</th>
                    <th>Harga Awal</th>
                    <th>Harga Akhir</th>
                    <th>Pemenang</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($lelangs as $l)
                <tr>
                    <td>
                        @if($l->barang->foto)
                            <img src="{{ asset($l->barang->foto) }}" alt="Foto Barang" width="80">
                        @else
                            Tidak ada foto
                        @endif
                    </td>
                    <td>{{ $l->id_lelang }}</td>
                    <td>{{ $l->barang->nama_barang }}</td>
                    <td>{{ $l->tgl_lelang }}</td>
                    <td>Rp {{ number_format($l->barang->harga_awal, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($l->harga_akhir, 0, ',', '.') }}</td>
                    <td>{{ $l->masyarakat ? $l->masyarakat->nama_lengkap : '-' }}</td>
                    <td>{{ $l->status }}</td>
                    <td>
                        @if($l->status == 'dibuka')
                            <a href="{{ route('lelang.close', $l->id_lelang) }}" class="btn btn-danger btn-sm"
                            onclick="return confirm('Yakin menutup lelang ini?')">Tutup</a>
                        @else
                            <span class="text-muted">(Ditutup)</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>