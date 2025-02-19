<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LelangLee - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body { background-color: #2c2c2c; color: white; }
        .navbar { background-color: #3d3d3d; }
        .hero-section { background: #5a2d82; padding: 50px 0; text-align: center; color: white; }
        .search-section { background: #fff; color: black; padding: 20px; border-radius: 10px; }
        .category-icons img { width: 50px; margin: 5px; }
        .auction-card { background: #3d3d3d; padding: 20px; border-radius: 10px; color: white; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">LelangLee</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Jadwal Lelang</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Beli NPL</a></li>
                    <li class="nav-item"><a class="nav-link btn btn-warning text-dark" href="#">Masuk</a></li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="hero-section">
        <h1>Pembaruan Syarat dan Ketentuan</h1>
        <h2>LELANGLEE 2025</h2>
        <button class="btn btn-warning">Pelajari Lebih Lanjut</button>
    </div>

    <div class="container my-4">
        <div class="search-section">
            <h4>Selamat Pagi, sedang mencari lelang apa?</h4>
            <div class="row mt-3">
                <div class="col-md-3"><input type="text" class="form-control" placeholder="Merk"></div>
                <div class="col-md-3"><input type="text" class="form-control" placeholder="Seri"></div>
                <div class="col-md-3"><input type="text" class="form-control" placeholder="Tahun"></div>
                <div class="col-md-3"><button class="btn btn-dark w-100">Cari</button></div>
            </div>
        </div>

        <h4 class="mt-4">Jadwal Lelang Terdekat</h4>
        <div class="row">
            <div class="col-md-4">
                <div class="auction-card">
                    <h5>19 Feb - Jakarta</h5>
                    <p>13.00 WIB - Live</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="auction-card">
                    <h5>19 Feb - Surabaya</h5>
                    <p>14.00 WIB - Live</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="auction-card">
                    <h5>19 Feb - Palembang</h5>
                    <p>14.00 WIB - Live</p>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>