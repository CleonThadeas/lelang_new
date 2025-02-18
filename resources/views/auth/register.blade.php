
<!DOCTYPE html>
<html>
<head>
    <title>Register - Sistem Lelang</title>
</head>
<body>
    <h1>Register (Masyarakat)</h1>
    @if($errors->any())
        <div style="color:red;">
            <ul>
                @foreach($errors->all() as $err)
                <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <label>Nama Lengkap</label><br>
        <input type="text" name="nama_lengkap" required><br><br>

        <label>Username</label><br>
        <input type="text" name="username" required><br><br>

        <label>Password</label><br>
        <input type="password" name="password" required><br><br>

        <label>Telepon</label><br>
        <input type="text" name="telp" required><br><br>

        <button type="submit">Register</button>
    </form>
</body>
</html>
