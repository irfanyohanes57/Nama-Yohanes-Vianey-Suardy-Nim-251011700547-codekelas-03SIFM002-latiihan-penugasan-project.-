@extends('admin.template')

@php
    $edit = $perangkat->exists;
@endphp

@section('title', $edit ? 'Edit Data' : 'Tambah Data')

@push('styles')
<style>
    .page-header h1 { margin: 0 0 4px; font-size: 24px; }
    .page-header p { margin: 0 0 20px; color: #6c757d; }
    .card { background: #fff; border: 1px solid #dee2e6; border-radius: 6px; padding: 25px; max-width: 700px; }
    .form-group { margin-bottom: 16px; }
    .form-group label { display: block; font-weight: 600; margin-bottom: 6px; }
    .form-group input, .form-group select, .form-group textarea {
        width: 100%; padding: 8px 10px; border: 1px solid #ced4da; border-radius: 4px; font-size: 14px; font-family: inherit;
    }
    .form-group textarea { min-height: 90px; resize: vertical; }
    .form-group .err { color: #dc3545; font-size: 12px; margin-top: 4px; }
    .form-group input.invalid, .form-group select.invalid, .form-group textarea.invalid { border-color: #dc3545; }
    .hint { color: #6c757d; font-size: 12px; margin-top: 4px; }
    .form-aksi { display: flex; gap: 10px; margin-top: 20px; }
    .preview { margin-top: 8px; width: 90px; height: 68px; object-fit: cover; border-radius: 4px; border: 1px solid #dee2e6; background: #e9ecef; }
</style>
@endpush

@section('content')
    <div class="page-header">
        <h1>{{ $edit ? 'Edit Data' : 'Tambah Data' }}</h1>
        <p>{{ $edit ? 'Ubah data perangkat lalu simpan.' : 'Isi data perangkat baru lalu simpan.' }}</p>
    </div>

    <div class="card">
        @if ($errors->any())
            <div class="alert alert-danger">Data belum bisa disimpan, periksa kolom yang berwarna merah.</div>
        @endif

        <form action="{{ $edit ? route('admin.update', $perangkat->id) : route('admin.store') }}" method="POST">
            @csrf
            @if ($edit)
                @method('PUT')
            @endif

            <div class="form-group">
                <label for="nama">Nama Perangkat (Judul)</label>
                <input type="text" id="nama" name="nama" value="{{ old('nama', $perangkat->nama) }}"
                       class="{{ $errors->has('nama') ? 'invalid' : '' }}" placeholder="Contoh: Processor (CPU)">
                @error('nama') <div class="err">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="kategori">Kategori</label>
                <select id="kategori" name="kategori" class="{{ $errors->has('kategori') ? 'invalid' : '' }}">
                    <option value="">-- Pilih kategori --</option>
                    @foreach ($kategoriList as $kat)
                        <option value="{{ $kat }}" {{ old('kategori', $perangkat->kategori) === $kat ? 'selected' : '' }}>{{ $kat }}</option>
                    @endforeach
                </select>
                @error('kategori') <div class="err">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" class="{{ $errors->has('deskripsi') ? 'invalid' : '' }}"
                          placeholder="Penjelasan singkat tentang perangkat">{{ old('deskripsi', $perangkat->deskripsi) }}</textarea>
                @error('deskripsi') <div class="err">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="spesifikasi">Spesifikasi (Teknologi)</label>
                <input type="text" id="spesifikasi" name="spesifikasi" value="{{ old('spesifikasi', $perangkat->spesifikasi) }}"
                       class="{{ $errors->has('spesifikasi') ? 'invalid' : '' }}" placeholder="Contoh: Intel Core i7 / AMD Ryzen 7">
                @error('spesifikasi') <div class="err">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <input type="text" id="status" name="status" value="{{ old('status', $perangkat->status) }}"
                       class="{{ $errors->has('status') ? 'invalid' : '' }}" placeholder="Contoh: Aktif / Terpasang">
                @error('status') <div class="err">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="gambar">Link Gambar (opsional)</label>
                <input type="text" id="gambar" name="gambar" value="{{ old('gambar', $perangkat->gambar) }}"
                       class="{{ $errors->has('gambar') ? 'invalid' : '' }}" placeholder="https://...">
                <div class="hint">Isi dengan link gambar (diawali https://). Boleh dikosongkan.</div>
                @error('gambar') <div class="err">{{ $message }}</div> @enderror
                @if (old('gambar', $perangkat->gambar))
                    <img class="preview" src="{{ old('gambar', $perangkat->gambar) }}" alt="Preview"
                         onerror="this.style.display='none'">
                @endif
            </div>

            <div class="form-aksi">
                <button type="submit" class="btn btn-primary">{{ $edit ? 'Simpan Perubahan' : 'Simpan' }}</button>
                <a href="{{ route('admin.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
@endsection
