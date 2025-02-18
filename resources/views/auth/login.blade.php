
<!DOCTYPE html>
<html>
<head>
    <title>Login - Sistem Lelang</title>
</head>
<body>
    <h1>Login</h1>
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

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <label>Username</label><br>
        <input type="text" name="username" required><br><br>

        <label>Password</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Login</button>
    </form>
    <p>Belum punya akun? <a href="{{ route('register.form') }}">Registrasi</a></p>
</body>
</html>