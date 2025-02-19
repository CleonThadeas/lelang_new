<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - LelangLee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body { background-color: #2c2c2c; color: white; }
        .sidebar { background: #3d3d3d; height: 100vh; padding: 20px; }
        .sidebar a { color: white; text-decoration: none; }
        .sidebar a:hover { color: #f4a261; }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar p-3">
            <h3 class="text-center">LelangLee</h3>
            <p class="text-center">Halo, {{ session('username') }} ({{ session('level') == 1 ? 'Admin' : (session('level') == 2 ? 'Petugas' : 'Masyarakat') }})</p>
            <ul class="list-unstyled">
                @if(session('level') == 1)
                    <li><a href="{{ route('petugas.index') }}"><i class="fa fa-user-shield"></i> Kelola Petugas</a></li>
                @endif
                @if(session('level') <= 2)
                    <li><a href="{{ route('barang.index') }}"><i class="fa fa-box"></i> Kelola Barang</a></li>
                    <li><a href="{{ route('lelang.index') }}"><i class="fa fa-gavel"></i> Kelola Lelang</a></li>
                    <li><a href="{{ route('laporan.index') }}"><i class="fa fa-file-alt"></i> Laporan</a></li>
                @else
                    <li><a href="{{ route('list.barang') }}"><i class="fa fa-eye"></i> Lihat Barang Lelang</a></li>
                @endif
                <li><a href="{{ route('logout') }}" class="text-danger"><i class="fa fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </div>
        
        <!-- Content -->
        <div class="container-fluid p-4">
            <h2>Dashboard</h2>
            <p>Selamat datang di sistem lelang online LelangLee!</p>
            <div class="row">
                <div class="col-md-4">
                    <div class="card bg-dark text-white p-3">
                        <h4><i class="fa fa-users"></i> Total Pengguna</h4>
                        <p>{{ $totalUsers ?? 0 }} pengguna</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-dark text-white p-3">
                        <h4><i class="fa fa-box"></i> Total Barang</h4>
                        <p>{{ $totalBarang ?? 0 }} barang dilelang</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-dark text-white p-3">
                        <h4><i class="fa fa-gavel"></i> Total Lelang</h4>
                        <p>{{ $totalLelang ?? 0 }} lelang aktif</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
