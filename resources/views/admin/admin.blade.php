@extends('admin.template')

@section('title', 'Admin Dashboard')

@push('styles')
<style>
    .page-header { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 20px; gap: 15px; }
    .page-header h1 { margin: 0 0 4px; font-size: 24px; }
    .page-header p { margin: 0; color: #6c757d; }

    .card { background: #fff; border: 1px solid #dee2e6; border-radius: 6px; padding: 20px; }
    .toolbar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px; gap: 10px; flex-wrap: wrap; }
    .toolbar select, .toolbar input { padding: 6px 10px; border: 1px solid #ced4da; border-radius: 4px; font-size: 13px; }
    .toolbar input { width: 220px; }

    .table-wrap { overflow-x: auto; }
    table { width: 100%; border-collapse: collapse; }
    th, td { padding: 10px 12px; border-bottom: 1px solid #dee2e6; text-align: left; vertical-align: middle; }
    th { background: #f8f9fa; font-weight: 600; white-space: nowrap; }
    tbody tr:hover { background: #f8fbff; }

    .thumb { width: 60px; height: 45px; object-fit: cover; border-radius: 4px; border: 1px solid #dee2e6; background: #e9ecef; display: block; }
    .nama { font-weight: 600; }
    .deskripsi { max-width: 320px; color: #495057; }
    .aksi { white-space: nowrap; }
    .aksi form { display: inline; }

    .badge { display: inline-block; padding: 3px 9px; border-radius: 20px; font-size: 11px; font-weight: 700; text-transform: uppercase; margin-top: 4px; }
    .badge-hardware { background: #e7f1ff; color: #0d6efd; }
    .badge-software { background: #d1e7dd; color: #0f5132; }
    .badge-periferal { background: #fff3cd; color: #664d03; }

    .empty { text-align: center; color: #6c757d; padding: 25px; display: none; }
    .info { margin-top: 12px; color: #6c757d; font-size: 13px; }
</style>
@endpush

@php
    // Gambar pengganti kalau link gambar kosong / rusak
    $kosong = "data:image/svg+xml;utf8,<svg xmlns=%27http://www.w3.org/2000/svg%27 width=%2760%27 height=%2745%27><rect width=%2760%27 height=%2745%27 fill=%27%23dee2e6%27/><text x=%2730%27 y=%2727%27 font-size=%279%27 text-anchor=%27middle%27 fill=%27%236c757d%27>No Image</text></svg>";
@endphp

@section('content')
    <div class="page-header">
        <div>
            <h1>Admin Dashboard</h1>
            <p>Halaman Kelola Projects</p>
        </div>
        <a href="{{ route('admin.create') }}" class="btn btn-primary">Tambah Data</a>
    </div>

    <div class="card">
        <div class="toolbar">
            <div>
                Tampilkan
                <select id="filterKategori">
                    <option value="">Semua kategori</option>
                    <option value="hardware">Hardware</option>
                    <option value="software">Software</option>
                    <option value="periferal">Periferal</option>
                </select>
            </div>
            <div>
                Search: <input type="text" id="cari" placeholder="Cari nama, spesifikasi, status...">
            </div>
        </div>

        @if ($perangkat->isEmpty())
            <p class="empty" style="display:block">Belum ada data. Klik "Tambah Data" untuk menambahkan.</p>
        @endif

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Teknologi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="tabelData">
                    @foreach ($perangkat as $item)
                        <tr data-kategori="{{ strtolower($item->kategori) }}">
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img class="thumb" src="{{ $item->gambar ?: $kosong }}" alt="{{ $item->nama }}" loading="lazy"
                                     onerror="this.onerror=null;this.src='{{ $kosong }}'">
                            </td>
                            <td>
                                <div class="nama">{{ $item->nama }}</div>
                                <span class="badge badge-{{ strtolower($item->kategori) }}">{{ $item->kategori }}</span>
                            </td>
                            <td class="deskripsi">{{ $item->deskripsi }}</td>
                            <td>{{ $item->spesifikasi }}</td>
                            <td>{{ $item->status }}</td>
                            <td class="aksi">
                                <a href="{{ route('admin.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('admin.destroy', $item->id) }}" method="POST"
                                      onsubmit="return confirm('Yakin hapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="empty" id="kosong">Data tidak ditemukan.</div>
        </div>

        <div class="info">Menampilkan <span id="jumlah">{{ count($perangkat) }}</span> dari {{ count($perangkat) }} data</div>
    </div>
@endsection

@push('scripts')
<script>
    // Pencarian & filter sederhana di sisi browser (tanpa reload)
    const cari = document.getElementById('cari');
    const filter = document.getElementById('filterKategori');
    const baris = document.querySelectorAll('#tabelData tr');

    function terapkan() {
        const kata = cari.value.toLowerCase().trim();
        const kat = filter.value;
        let tampil = 0;

        baris.forEach(tr => {
            const cocokKata = tr.innerText.toLowerCase().includes(kata);
            const cocokKat = !kat || tr.dataset.kategori === kat;
            const ok = cocokKata && cocokKat;
            tr.style.display = ok ? '' : 'none';
            if (ok) tampil++;
        });

        document.getElementById('jumlah').textContent = tampil;
        document.getElementById('kosong').style.display = tampil ? 'none' : 'block';
    }

    cari.addEventListener('input', terapkan);
    filter.addEventListener('change', terapkan);
</script>
@endpush
