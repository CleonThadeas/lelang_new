<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - LelangLee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #222831; color: #EEEEEE; display: flex; justify-content: center; align-items: center; height: 100vh; }
        .login-container {
            background-color: #393E46;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 350px;
        }
        .login-container h1 { color: #00ADB5; }
        .login-container input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
        }
        .btn-custom { background: #00ADB5; color: white; border: none; padding: 10px; width: 100%; border-radius: 5px; cursor: pointer; }
        .btn-custom:hover { background: #007b8e; }
        .login-container a { color: #00ADB5; text-decoration: none; }
        .login-container a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        @if($errors->any())
            <div style="color:red; text-align: left;">
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
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" class="btn-custom">Login</button>
        </form>
        <p>Belum punya akun? <a href="{{ route('register.form') }}">Registrasi</a></p>
    </div>
</body>
</html>
