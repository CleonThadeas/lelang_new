<!DOCTYPE html>
<html>
<head>
    <title>Daftar Barang Lelang Dibuka</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            text-align: center;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .success-message {
            color: green;
            font-weight: bold;
            margin-bottom: 15px;
        }
        .btn-tawar {
            display: inline-block;
            padding: 8px 12px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
        }
        .btn-tawar:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Daftar Barang Lelang Dibuka</h1>
        @if(session('success'))
            <p class="success-message">{{ session('success') }}</p>
        @endif
        <table>
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
                <td>{{ number_format($l->barang->harga_awal, 0, ',', '.') }}</td>
                <td>{{ $l->tgl_lelang }}</td>
                <td>
                    <a href="{{ route('tawar.form', $l->id_lelang) }}" class="btn-tawar">Tawar</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>
