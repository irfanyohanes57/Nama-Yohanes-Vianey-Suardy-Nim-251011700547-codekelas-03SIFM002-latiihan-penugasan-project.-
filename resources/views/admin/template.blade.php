<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f4f6f9; color: #212529; font-size: 14px; }

        /* Layout */
        .wrapper { display: flex; min-height: 100vh; }

        /* Sidebar */
        .sidebar { width: 210px; background: #212529; color: #fff; flex-shrink: 0; }
        .sidebar-title { padding: 18px 20px; font-size: 16px; font-weight: 700; border-bottom: 1px solid #343a40; }
        .sidebar ul { list-style: none; margin: 0; padding: 10px 0; }
        .sidebar ul li a { display: block; padding: 10px 20px; color: #adb5bd; text-decoration: none; }
        .sidebar ul li a:hover, .sidebar ul li a.active { background: #343a40; color: #fff; }

        /* Konten */
        .main { flex: 1; min-width: 0; display: flex; flex-direction: column; }
        .topbar { background: #fff; padding: 14px 25px; display: flex; justify-content: flex-end; align-items: center; gap: 15px; border-bottom: 1px solid #dee2e6; }
        .topbar span { color: #495057; }
        .content { padding: 25px; flex: 1; }
        .footer { text-align: center; padding: 15px; color: #888; font-size: 12px; }

        /* Komponen umum */
        .btn { display: inline-block; padding: 6px 12px; border-radius: 4px; border: 0; color: #fff; text-decoration: none; font-size: 13px; cursor: pointer; }
        .btn-primary { background: #0d6efd; }
        .btn-warning { background: #ffc107; color: #212529; }
        .btn-danger { background: #dc3545; }
        .btn-secondary { background: #6c757d; }
        .btn-sm { padding: 4px 10px; font-size: 12px; }

        /* Notifikasi */
        .alert { padding: 12px 16px; border-radius: 4px; margin-bottom: 18px; }
        .alert-success { background: #d1e7dd; color: #0f5132; border: 1px solid #badbcc; }
        .alert-danger { background: #f8d7da; color: #842029; border: 1px solid #f5c2c7; }

        @media (max-width: 768px) {
            .wrapper { flex-direction: column; }
            .sidebar { width: 100%; }
        }
    </style>
    @stack('styles')
</head>
<body>
    <div class="wrapper">

        <!-- SIDEBAR -->
        <aside class="sidebar">
            <div class="sidebar-title">Admin Panel</div>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="{{ route('admin.index') }}" class="active">Projects</a></li>
            </ul>
        </aside>

        <!-- AREA UTAMA -->
        <div class="main">
            <div class="topbar">
                <span>Halo, Administrator</span>
            </div>

            <div class="content">
                @if (session('sukses'))
                    <div class="alert alert-success">{{ session('sukses') }}</div>
                @endif

                @yield('content')
            </div>

            <div class="footer">&copy; 2026 Admin Panel - PRODI SI UNPAM</div>
        </div>
    </div>

    @stack('scripts')
</body>
</html>
