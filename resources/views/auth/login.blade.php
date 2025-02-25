<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - LelangLee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #222831;
            color: #EEEEEE;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Poppins', sans-serif;
        }
        .login-container {
            background-color: #393E46;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
            text-align: center;
            width: 360px;
            transition: transform 0.3s ease-in-out;
        }
        .login-container:hover {
            transform: scale(1.02);
        }
        .login-container h1 {
            color: #00ADB5;
            font-weight: 700;
            margin-bottom: 20px;
        }
        .login-container input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: none;
            border-radius: 8px;
            background: #EEEEEE;
            font-size: 16px;
        }
        .btn-custom {
            background: #00ADB5;
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 8px;
            cursor: pointer;
            font-size: 18px;
            font-weight: bold;
            transition: background 0.3s;
        }
        .btn-custom:hover {
            background: #007b8e;
        }
        .login-container a {
            color: #00ADB5;
            text-decoration: none;
            font-weight: bold;
        }
        .login-container a:hover {
            text-decoration: underline;
        }
        .error-message {
            color: red;
            text-align: left;
            font-size: 14px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        @if($errors->any())
            <div class="error-message">
                <ul>
                    @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('success'))
            <p style="color:green; font-weight: bold;">{{ session('success') }}</p>
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
