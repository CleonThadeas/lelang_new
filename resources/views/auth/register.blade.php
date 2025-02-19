<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - LelangLee</title>
    <style>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        /* Warna utama */
        :root {
            --dark-gray: #222831;
            --gray: #393E46;
            --light-gray: #EEEEEE;
            --primary: #00ADB5;
            --primary-dark: #008C9E;
        }

        body {
            background: var(--gray);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* HEADER */
        .header {
            background: var(--dark-gray);
            color: var(--light-gray);
            text-align: center;
            padding: 20px;
            font-size: 26px;
            font-weight: bold;
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
        }

        /* CONTAINER */
        .container {
            background: var(--light-gray);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 400px;
            text-align: center;
            animation: fadeIn 0.8s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h1 {
            color: var(--dark-gray);
            font-size: 24px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        label {
            font-weight: bold;
            font-size: 14px;
            display: block;
            color: var(--dark-gray);
        }

        input {
            width: 100%;
            padding: 12px;
            border: 2px solid var(--primary);
            border-radius: 8px;
            font-size: 16px;
            background: var(--light-gray);
            color: var(--dark-gray);
            outline: none;
            transition: all 0.3s;
        }

        input::placeholder {
            color: #888;
        }

        input:focus {
            background: #DDDDDD;
            border-color: var(--primary-dark);
            transform: scale(1.02);
        }

        button {
            background: var(--primary);
            color: white;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            cursor: pointer;
            width: 100%;
            transition: all 0.3s;
            font-weight: bold;
        }

        button:hover {
            background: var(--primary-dark);
            transform: scale(1.05);
        }

        .footer {
            background: var(--light-gray);
            text-align: center;
            padding: 15px;
            color: var(--dark-gray);
            font-size: 14px;
            font-weight: bold;
            width: 100%;
            position: fixed;
            bottom: 0;
            left: 0;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .container {
                width: 90%;
                padding: 20px;
            }

            h1 {
                font-size: 22px;
            }

            input {
                padding: 10px;
                font-size: 14px;
            }

            button {
                font-size: 16px;
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <!-- HEADER -->
    <div class="header">LelangLee - Register</div>

    <!-- FORM REGISTER -->
    <div class="container">
        <h1>Daftar Akun</h1>

        @if($errors->any())
            <div class="error" style="color: red; margin-bottom: 10px;">
                <ul>
                    @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('success'))
            <p style="color: green; font-weight: bold;">{{ session('success') }}</p>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama_lengkap" placeholder="Masukkan Nama Lengkap" required>
            </div>

            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" placeholder="Masukkan Username" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Masukkan Password" required>
            </div>

            <div class="form-group">
                <label>Telepon</label>
                <input type="text" name="telp" placeholder="Masukkan Nomor Telepon" required>
            </div>

            <button type="submit">Register</button>
        </form>
    </div>

    <!-- FOOTER -->
    <div class="footer">&copy; 2025 LelangLee | All Rights Reserved</div>
</body>
</html>
