html
<!DOCTYPE html>
<html>
<head>
    <title>Penawaran Barang</title>
</head>
<body>
    <h1>Penawaran Barang</h1>
    <p>Nama Barang: {{ $lelang->barang->nama_barang }}</p>
    <p>Harga Awal : {{ $lelang->barang->harga_awal }}</p>

    @if($errors->any())
        <div style="color:red;">
            <ul>
                @foreach($errors->all() as $err)
                <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('tawar.store', $lelang->id_lelang) }}">
        @csrf
        <label>Masukkan Harga Penawaran</label><br>
        <input type="number" name="penawaran_harga" min="{{ $lelang->barang->harga_awal }}" required><br><br>
        <button type="submit">Tawar</button>
    </form>
</body>
</html>
