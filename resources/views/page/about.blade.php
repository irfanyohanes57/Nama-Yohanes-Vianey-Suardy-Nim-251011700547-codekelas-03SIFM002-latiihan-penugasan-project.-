<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Sistem Katalog Perangkat Komputer</title>
    <style>
        * { box-sizing: border-box; }
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            margin: 0; 
            color: #333;
            background-color: #f4f7f6;
            /* Background gradasi putih dibuat lebih tipis (transparan) agar foto gedung kampus di belakang terlihat lebih jelas */
            background-image: linear-gradient(rgba(255,255,255,0.4), rgba(255,255,255,0.4)), url('https://images.unsplash.com/photo-1541339907198-e08756dedf3f?w=1600&auto=format&fit=crop&q=80');
            background-size: cover; 
            background-position: center; 
            background-attachment: fixed; 
            background-repeat: no-repeat; 
        }

        /* Navbar */
        .navbar { background-color: #0d6efd; color: white; display: flex; justify-content: space-between; align-items: center; padding: 15px 50px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); position: sticky; top: 0; z-index: 1000; }
        .navbar .logo { font-size: 22px; font-weight: bold; letter-spacing: 1px; }
        .navbar ul { list-style: none; display: flex; margin: 0; padding: 0; gap: 25px; }
        .navbar ul li a { color: white; text-decoration: none; font-size: 16px; font-weight: 500; transition: opacity 0.2s; }
        .navbar ul li a:hover { opacity: 0.8; }

        /* Kotak putih utama */
        .container { max-width: 1350px; margin: 60px auto; padding: 0 20px; }
        .about-card { background: white; border-radius: 16px; border: 1px solid #e0e0e0; box-shadow: 0 4px 12px rgba(0,0,0,0.05); padding: 60px; }

        /* Foto papan sirkuit di dalam card (tetap seperti semula) */
        .about-img { width: 100%; height: 390px; object-fit: cover; border-radius: 12px; display: block; margin-bottom: 30px; }

        .about-title { text-align: center; color: #0d6efd; font-size: 38px; font-weight: 700; margin: 0 0 30px; }
        .about-text { font-size: 18px; line-height: 1.8; color: #555; margin: 0 0 30px; }

        /* Kotak angka */
        .stats { display: grid; grid-template-columns: repeat(3, 1fr); gap: 25px; }
        .stat { background: #f8f9fa; border: 1px solid #e9ecef; border-radius: 10px; padding: 25px 20px; text-align: center; }
        .stat-number { font-size: 36px; font-weight: 700; color: #0d6efd; line-height: 1.2; }
        .stat-label { font-size: 17px; font-weight: 500; color: #333; margin-top: 6px; }

        @media (max-width: 768px) {
            .about-card { padding: 25px; }
            .about-img { height: 220px; }
            .stats { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="logo">PRODI SI UNPAM</div>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/mahasiswa">Profile</a></li>
            <li><a href="/project">Project</a></li>
            <li><a href="/about">About</a></li>
        </ul>
    </nav>

    <div class="container">
        <div class="about-card">
            <!-- Foto sirkuit di dalam card tetap dibiarkan -->
            <img class="about-img" src="https://images.unsplash.com/photo-1518770660439-4636190af475?w=1000&auto=format&fit=crop&q=80" alt="Papan sirkuit komputer">

            <h1 class="about-title">Tentang Sistem Katalog Perangkat Komputer</h1>

            <p class="about-text">Aplikasi web ini dikembangkan sebagai bentuk pemenuhan tugas praktikum mata kuliah berbasis web di Program Studi Sistem Informasi Universitas Pamulang. Sistem ini dirancang untuk menyajikan informasi terintegrasi mengenai ekosistem perangkat komputer secara menyeluruh.</p>

            <div class="stats">
                <div class="stat">
                    <div class="stat-number">10</div>
                    <div class="stat-label">Hardware (Perangkat Keras)</div>
                </div>
                <div class="stat">
                    <div class="stat-number">5</div>
                    <div class="stat-label">Software (Perangkat Lunak)</div>
                </div>
                <div class="stat">
                    <div class="stat-number">5</div>
                    <div class="stat-label">Periferal Pendukung</div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>