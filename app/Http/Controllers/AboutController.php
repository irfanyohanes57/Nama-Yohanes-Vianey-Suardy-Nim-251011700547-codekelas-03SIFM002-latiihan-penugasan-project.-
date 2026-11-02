<?php

namespace App\Http\Controllers;

class AboutController extends Controller
{
    public function index()
    {
        $mahasiswa = [
            'nama' => 'Yohanes',
            'status' => 'Mahasiswa Aktif',
            'nim' => '251011700547',
            'email' => 'irfansuardy688@gmail.com',
            'prodi' => 'Sistem Informasi',
        ];

        return view('mahasiswa', compact('mahasiswa'));
    }
}