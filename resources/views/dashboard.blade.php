html
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Sistem Lelang</title>
</head>
<body>
    <h1>Dashboard</h1>
    <p>Halo, {{ session('username') }} (Level: 
        @if(session('level') == 1) Administrator
        @elseif(session('level') == 2) Petugas
        @else Masyarakat
        @endif
    )</p>

    <ul>
        @if(session('level') == 1)
            <li><a href="{{ route('petugas.index') }}">Kelola Petugas</a></li>
            <li><a href="{{ route('barang.index') }}">Kelola Barang</a></li>
            <li><a href="{{ route('lelang.live.admin') }}">Live Lelang</a></li>
            <li><a href="{{ route('lelang.index') }}">Kelola Lelang</a></li>
            <li><a href="{{ route('laporan.index') }}">Laporan</a></li>
        @elseif(session('level') == 2)
            <li><a href="{{ route('barang.index') }}">Kelola Barang</a></li>
            <li><a href="{{ route('lelang.live.admin') }}">Live Lelang</a></li>
            <li><a href="{{ route('lelang.index') }}">Kelola Lelang</a></li>
            <li><a href="{{ route('laporan.index') }}">Laporan</a></li>
        @else
            <li><a href="{{ route('list.barang') }}">Lihat Barang Lelang (Dibuka)</a></li>
        @endif
        <li><a href="{{ route('logout') }}">Logout</a></li>
    </ul>
</body>
</html>