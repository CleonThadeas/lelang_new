<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - LelangLee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #222831; color: #EEEEEE; font-family: 'Poppins', sans-serif; }
        .navbar { background-color: #393E46; padding: 15px; }
        .dashboard-container { padding: 30px; text-align: center; }
        .dashboard-card {
            background: #393E46;
            padding: 20px;
            border-radius: 10px;
            color: #EEEEEE;
            margin-bottom: 15px;
            text-align: center;
            transition: transform 0.3s;
        }
        .dashboard-card:hover { transform: scale(1.05); background: #00ADB5; color: #fff; }
        .dashboard-card a { text-decoration: none; color: inherit; font-weight: bold; }
        .btn-logout { background-color: #00ADB5; color: white; }
        .logo { width: 150px; display: block; margin: 0 auto 20px; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="/img/lelanglee_.png" alt="LelangLee Logo" class="logo"> 
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link btn btn-logout" href="{{ route('logout') }}">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container dashboard-container">
        <h2>Dashboard</h2>
        <p>Halo, <strong>{{ session('username') }}</strong> (Level: 
            @if(session('level') == 1) Administrator
            @elseif(session('level') == 2) Petugas
            @else Masyarakat
            @endif)
        </p>
        
        <div class="row">
            @if(session('level') == 1)
                <div class="col-md-4"><div class="dashboard-card"><a href="{{ route('petugas.index') }}">Kelola Petugas</a></div></div>
                <div class="col-md-4"><div class="dashboard-card"><a href="{{ route('barang.index') }}">Kelola Barang</a></div></div>
                <div class="col-md-4"><div class="dashboard-card"><a href="{{ route('lelang.live.admin') }}">Live Lelang</a></div></div>
                <div class="col-md-4"><div class="dashboard-card"><a href="{{ route('lelang.index') }}">Kelola Lelang</a></div></div>
                <div class="col-md-4"><div class="dashboard-card"><a href="{{ route('laporan.index') }}">Laporan</a></div></div>
            @elseif(session('level') == 2)
                <div class="col-md-4"><div class="dashboard-card"><a href="{{ route('barang.index') }}">Kelola Barang</a></div></div>
                <div class="col-md-4"><div class="dashboard-card"><a href="{{ route('lelang.live.admin') }}">Live Lelang</a></div></div>
                <div class="col-md-4"><div class="dashboard-card"><a href="{{ route('lelang.index') }}">Kelola Lelang</a></div></div>
                <div class="col-md-4"><div class="dashboard-card"><a href="{{ route('laporan.index') }}">Laporan</a></div></div>
            @else
                <div class="col-md-4"><div class="dashboard-card"><a href="{{ route('list.barang') }}">Lihat Barang Lelang</a></div></div>
            @endif
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
