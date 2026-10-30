<?php

namespace Database\Seeders;

use App\Models\Perangkat;
use Illuminate\Database\Seeder;

class PerangkatSeeder extends Seeder
{
    /**
     * Isi tabel perangkats dengan 20 data dari project (halaman Home & Project).
     */
    public function run(): void
    {
        // Supaya tidak dobel kalau seeder dijalankan lagi.
        if (Perangkat::count() > 0) {
            return;
        }

        $data = [
            [
                'nama' => 'Processor (CPU)',
                'kategori' => 'Hardware',
                'deskripsi' => 'Otak utama komputer untuk memproses data dan instruksi.',
                'spesifikasi' => 'Intel Core i7 / AMD Ryzen 7',
                'status' => 'Aktif / Terpasang',
                'gambar' => 'https://images.unsplash.com/photo-1591799264318-7e6ef8ddb7ea?w=500&auto=format&fit=crop&q=80',
            ],
            [
                'nama' => 'Motherboard',
                'kategori' => 'Hardware',
                'deskripsi' => 'Papan sirkuit pusat yang menghubungkan seluruh komponen hardware.',
                'spesifikasi' => 'ROG Z790 Gaming Series',
                'status' => 'Aktif / Terpasang',
                'gambar' => 'https://images.unsplash.com/photo-1518770660439-4636190af475?w=500&auto=format&fit=crop&q=80',
            ],
            [
                'nama' => 'RAM (Memory)',
                'kategori' => 'Hardware',
                'deskripsi' => 'Penyimpanan data sementara yang sedang diproses CPU secara kilat.',
                'spesifikasi' => 'DDR5 32GB Dual Channel',
                'status' => 'Aktif / Terpasang',
                'gambar' => 'https://images.unsplash.com/photo-1562976540-1502c2145186?w=500&auto=format&fit=crop&q=80',
            ],
            [
                'nama' => 'Graphics Card (GPU)',
                'kategori' => 'Hardware',
                'deskripsi' => 'Komponen pemroses grafis untuk gaming, rendering, dan AI.',
                'spesifikasi' => 'NVIDIA GeForce RTX 4080',
                'status' => 'Aktif / Terpasang',
                'gambar' => 'https://images.unsplash.com/photo-1587202372775-e229f172b9d7?w=500&auto=format&fit=crop&q=80',
            ],
            [
                'nama' => 'SSD (Storage)',
                'kategori' => 'Hardware',
                'deskripsi' => 'Media penyimpanan permanen berkecepatan tinggi berbasis chip flash.',
                'spesifikasi' => 'NVMe M.2 2TB Gen4',
                'status' => 'Aktif / Terpasang',
                'gambar' => 'https://images.unsplash.com/photo-1531492313106-c8724d9c7921?w=500&auto=format&fit=crop&q=80',
            ],
            [
                'nama' => 'Power Supply (PSU)',
                'kategori' => 'Hardware',
                'deskripsi' => 'Penyalur dan pengatur suplai arus listrik ke seluruh komponen PC.',
                'spesifikasi' => '750W 80+ Gold Fully Modular',
                'status' => 'Aktif / Terpasang',
                'gambar' => 'https://images.unsplash.com/photo-1587202372634-32705e3bf49c?w=500&auto=format&fit=crop&q=80',
            ],
            [
                'nama' => 'Casing PC',
                'kategori' => 'Hardware',
                'deskripsi' => 'Wadah pelindung fisik komponen sekaligus pengatur sirkulasi udara.',
                'spesifikasi' => 'Mid Tower ATX Tempered Glass',
                'status' => 'Aktif / Terpasang',
                'gambar' => 'https://images.unsplash.com/photo-1544652478-6653e09f18a2?w=500&auto=format&fit=crop&q=80',
            ],
            [
                'nama' => 'CPU Cooler',
                'kategori' => 'Hardware',
                'deskripsi' => 'Pendingin suhu prosesor agar tidak mengalami overheat saat kerja berat.',
                'spesifikasi' => 'AIO Liquid Cooler 240mm',
                'status' => 'Aktif / Terpasang',
                'gambar' => 'https://images.unsplash.com/photo-1593642632823-8f785ba67e45?w=500&auto=format&fit=crop&q=80',
            ],
            [
                'nama' => 'Hard Disk (HDD)',
                'kategori' => 'Hardware',
                'deskripsi' => 'Penyimpanan data konvensional berkapasitas besar berbasis piringan magnetik.',
                'spesifikasi' => '4TB SATA 7200RPM',
                'status' => 'Cadangan / Backup',
                'gambar' => 'https://images.unsplash.com/photo-1597872200969-2b65d56bd16b?w=500&auto=format&fit=crop&q=80',
            ],
            [
                'nama' => 'Optical Drive',
                'kategori' => 'Hardware',
                'deskripsi' => 'Perangkat pembaca dan penulis media cakram optik CD/DVD/Blu-ray.',
                'spesifikasi' => 'DVD-RW External/Internal',
                'status' => 'Opsional',
                'gambar' => 'https://images.unsplash.com/photo-1526738549149-8e07eca6c147?w=500&auto=format&fit=crop&q=80',
            ],
            [
                'nama' => 'Operating System',
                'kategori' => 'Software',
                'deskripsi' => 'Perangkat lunak utama pengelola hardware dan aplikasi komputer.',
                'spesifikasi' => 'Windows 11 Pro / Ubuntu Linux',
                'status' => 'Running Utama',
                'gambar' => 'https://images.unsplash.com/photo-1629654297299-c8506221ca97?w=500&auto=format&fit=crop&q=80',
            ],
            [
                'nama' => 'Text Editor / IDE',
                'kategori' => 'Software',
                'deskripsi' => 'Aplikasi penulisan kode program untuk pengembangan software.',
                'spesifikasi' => 'Visual Studio Code & PHPStorm',
                'status' => 'Running Utama',
                'gambar' => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=500&auto=format&fit=crop&q=80',
            ],
            [
                'nama' => 'Web Browser',
                'kategori' => 'Software',
                'deskripsi' => 'Aplikasi penjelajah internet untuk mengakses halaman web.',
                'spesifikasi' => 'Google Chrome & Mozilla Firefox',
                'status' => 'Running Utama',
                'gambar' => 'https://images.unsplash.com/photo-1507238691740-187a5b1d37b8?w=500&auto=format&fit=crop&q=80',
            ],
            [
                'nama' => 'Database Server',
                'kategori' => 'Software',
                'deskripsi' => 'Sistem pengelola basis data terstruktur untuk aplikasi web.',
                'spesifikasi' => 'MySQL / MariaDB via Laragon',
                'status' => 'Running Utama',
                'gambar' => 'https://images.unsplash.com/photo-1542744094-24638eff58bb?w=500&auto=format&fit=crop&q=80',
            ],
            [
                'nama' => 'Antivirus & Security',
                'kategori' => 'Software',
                'deskripsi' => 'Software perlindungan sistem dari serangan malware, virus, dan trojan.',
                'spesifikasi' => 'Windows Defender & Firewall',
                'status' => 'Aktif Proteksi',
                'gambar' => 'https://images.unsplash.com/photo-1618401471353-b98aedd04e11?w=500&auto=format&fit=crop&q=80',
            ],
            [
                'nama' => 'Monitor Display',
                'kategori' => 'Periferal',
                'deskripsi' => 'Perangkat output visual penampil antarmuka sistem operasi.',
                'spesifikasi' => 'Monitor IPS 27 Inch 144Hz',
                'status' => 'Terhubung',
                'gambar' => 'https://images.unsplash.com/photo-1527443224154-c4a3942d3acf?w=500&auto=format&fit=crop&q=80',
            ],
            [
                'nama' => 'Keyboard Mekanikal',
                'kategori' => 'Periferal',
                'deskripsi' => 'Perangkat input teks dan perintah perintah pintasan sistem.',
                'spesifikasi' => 'Keyboard RGB Mechanical Switch',
                'status' => 'Terhubung',
                'gambar' => 'https://images.unsplash.com/photo-1587829741301-dc798b83add3?w=500&auto=format&fit=crop&q=80',
            ],
            [
                'nama' => 'Mouse Gaming',
                'kategori' => 'Periferal',
                'deskripsi' => 'Perangkat penunjuk kursor optik untuk navigasi layar komputer.',
                'spesifikasi' => 'Wireless Mouse 16000 DPI',
                'status' => 'Terhubung',
                'gambar' => 'https://images.unsplash.com/photo-1615663245857-ac93bb7c39e7?w=500&auto=format&fit=crop&q=80',
            ],
            [
                'nama' => 'Headset Audio',
                'kategori' => 'Periferal',
                'deskripsi' => 'Perangkat output suara dan input mikrofon komunikasi suara.',
                'spesifikasi' => 'Surround Gaming Headset 7.1',
                'status' => 'Terhubung',
                'gambar' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=500&auto=format&fit=crop&q=80',
            ],
            [
                'nama' => 'Printer & Scanner',
                'kategori' => 'Periferal',
                'deskripsi' => 'Perangkat cetak dokumen fisik dan pemindai lembar kertas data.',
                'spesifikasi' => 'InkJet All-in-One Printer',
                'status' => 'Standby',
                'gambar' => 'https://images.unsplash.com/photo-1612815154858-60aa4c59eaa6?w=500&auto=format&fit=crop&q=80',
            ],
        ];

        foreach ($data as $item) {
            Perangkat::create($item);
        }
    }
}
