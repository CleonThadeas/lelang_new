<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body class="bg-dark text-white">
    <div class="container py-4">
        <h1 class="text-center mb-4">Kelola Barang (Admin/Petugas)</h1>

        <div class="card bg-secondary p-4">
            <h4>Tambah Barang</h4>
            <form action="{{ route('kelola.barang.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" name="nama_barang" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal (YYYY-MM-DD)</label>
                    <input type="date" class="form-control" name="tgl" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Harga Awal</label>
                    <input type="number" class="form-control" name="harga_awal" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi_barang"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Foto Produk:</label>
                    <input type="file" class="form-control" name="foto_produk" accept="image/*" required>
                </div>
                <button type="submit" class="btn btn-warning">Tambah</button>
            </form>
        </div>

        @if(session('success'))
            <div class="alert alert-success mt-3">{{ session('success') }}</div>
        @endif

        <div class="mt-4">
            <h4>Daftar Barang</h4>
            <table class="table table-striped table-dark">
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
                    @forelse($barangs as $barang)
                    <tr>
                        <td>
                            @if($barang->foto)
                                <img src="{{ asset($barang->foto) }}" alt="Foto Barang" width="100" class="img-thumbnail">
                            @else
                                Tidak ada foto
                            @endif
                        </td>
                        <td>{{ $barang->nama_barang }}</td>
                        <td>{{ $barang->tgl }}</td>
                        <td>{{ $barang->harga_awal }}</td>
                        <td>{{ $barang->deskripsi_barang }}</td>
                        <td>
                            <a href="{{ route('barang.destroy', $barang->id_barang) }}" class="btn btn-danger btn-sm"
                               onclick="return confirm('Yakin ingin menghapus?')">
                               <i class="fas fa-trash"></i> Hapus
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data barang.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>