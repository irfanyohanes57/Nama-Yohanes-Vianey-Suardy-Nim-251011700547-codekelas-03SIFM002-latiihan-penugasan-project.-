<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 14px;
            color: #212529;
            background-color: #f4f6f9;
            background-image:
                linear-gradient(rgba(33, 37, 41, 0.55), rgba(33, 37, 41, 0.55)),
                url('{{ asset('images/kampus.jpg') }}');
            background-size: cover;
            background-position: center;
        }
        .login-box { width: 100%; max-width: 380px; background: #fff; border-radius: 8px; padding: 30px; box-shadow: 0 10px 30px rgba(0,0,0,.25); }
        .login-box h1 { margin: 0 0 4px; font-size: 22px; }
        .login-box p.sub { margin: 0 0 20px; color: #6c757d; }
        label { display: block; margin-bottom: 5px; font-weight: 600; }
        input[type=text], input[type=password] { width: 100%; padding: 10px 12px; border: 1px solid #ced4da; border-radius: 4px; font-size: 14px; margin-bottom: 14px; }
        input:focus { outline: none; border-color: #0d6efd; box-shadow: 0 0 0 3px rgba(13,110,253,.15); }
        .remember { display: flex; align-items: center; gap: 6px; margin-bottom: 16px; color: #495057; }
        .btn { width: 100%; padding: 10px; border: 0; border-radius: 4px; background: #0d6efd; color: #fff; font-size: 14px; font-weight: 600; cursor: pointer; }
        .btn:hover { background: #0b5ed7; }
        .alert { padding: 10px 14px; border-radius: 4px; margin-bottom: 16px; font-size: 13px; }
        .alert-danger { background: #f8d7da; color: #842029; border: 1px solid #f5c2c7; }
        .alert-success { background: #d1e7dd; color: #0f5132; border: 1px solid #badbcc; }
        .back { display: block; text-align: center; margin-top: 16px; color: #6c757d; text-decoration: none; font-size: 13px; }
        .back:hover { color: #0d6efd; }
    </style>
</head>
<body>
    <div class="login-box">
        <h1>Login Admin</h1>
        <p class="sub">Masuk untuk mengelola data Projects</p>

        @if (session('sukses'))
            <div class="alert alert-success">{{ session('sukses') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('login.action') }}">
            @csrf
            <label for="username">Username</label>
            <input type="text" id="username" name="username" value="{{ old('username') }}" placeholder="admin" autofocus required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Masukkan password" required>

            <label class="remember"><input type="checkbox" name="remember" value="1"> Ingat saya</label>

            <button type="submit" class="btn">Login</button>
        </form>

        <a href="/" class="back">&larr; Kembali ke Home</a>
    </div>
</body>
</html>
