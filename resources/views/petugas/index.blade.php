<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Petugas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body { background-color: #222831; color: #EEEEEE; font-family: 'Arial', sans-serif; }
        .container { margin-top: 30px; }
        .card { background-color: #393E46; color: #EEEEEE; border-radius: 10px; padding: 20px; box-shadow: 0 0 10px rgba(0, 173, 181, 0.3); }
        .table { color: #EEEEEE; }
        .btn-danger { background-color: #dc3545; color: white; }
        .btn-warning { background-color: #00ADB5; color: white; }
        .btn-warning:hover { background-color: #007D85; }
        .btn-danger:hover { opacity: 0.8; }
        .table thead { background-color: #00ADB5; color: white; }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Kelola Petugas (Hanya Admin)</h2>
        <div class="card">
            <h4 class="mb-3">Tambah Petugas</h4>
            <form method="POST" action="{{ route('petugas.store') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama Petugas</label>
                    <input type="text" class="form-control" name="nama_petugas" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Level</label>
                    <select name="id_level" class="form-select" required>
                        @foreach($levels as $lvl)
                        <option value="{{ $lvl->id_level }}">{{ $lvl->nama_level }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-warning w-100">Tambah</button>
            </form>
        </div>
        
        <hr>
        
        <h4 class="mb-3">Daftar Petugas</h4>
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th>ID Petugas</th>
                    <th>Nama Petugas</th>
                    <th>Username</th>
                    <th>Level</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($petugas as $p)
                <tr>
                    <td>{{ $p->id_petugas }}</td>
                    <td>{{ $p->nama_petugas }}</td>
                    <td>{{ $p->username }}</td>
                    <td>{{ $p->level->nama_level }}</td>
                    <td>
                        <a href="{{ route('petugas.destroy',$p->id_petugas) }}" class="btn btn-danger btn-sm"
                           onclick="return confirm('Yakin ingin menghapus?')">
                            <i class="fas fa-trash-alt"></i> Hapus
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
