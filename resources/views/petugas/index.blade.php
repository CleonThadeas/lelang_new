html
<!DOCTYPE html>
<html>
<head>
    <title>Kelola Petugas</title>
</head>
<body>
    <h1>Kelola Petugas (Hanya Admin)</h1>
    <form method="POST" action="{{ route('petugas.store') }}">
        @csrf
        <label>Nama Petugas</label><br>
        <input type="text" name="nama_petugas" required><br>

        <label>Username</label><br>
        <input type="text" name="username" required><br>

        <label>Password</label><br>
        <input type="password" name="password" required><br>

        <label>Level</label><br>
        <select name="id_level" required>
            @foreach($levels as $lvl)
            <option value="{{ $lvl->id_level }}">{{ $lvl->nama_level }}</option>
            @endforeach
        </select><br><br>

        <button type="submit">Tambah</button>
    </form>
    <hr>
    <table border="1" cellpadding="5">
        <tr>
            <th>ID Petugas</th>
            <th>Nama Petugas</th>
            <th>Username</th>
            <th>Level</th>
            <th>Aksi</th>
        </tr>
        @foreach($petugas as $p)
        <tr>
            <td>{{ $p->id_petugas }}</td>
            <td>{{ $p->nama_petugas }}</td>
            <td>{{ $p->username }}</td>
            <td>{{ $p->level->nama_level }}</td>
            <td>
                <a href="{{ route('petugas.destroy',$p->id_petugas) }}"
                   onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
