@extends('layouts.app')

@section('title', 'Edit Petugas — ' . $petugas->nama_petugas)
@section('page-title', 'Edit Petugas')
@section('page-sub', 'Perbarui informasi petugas ' . $petugas->nama_petugas)

@section('topbar-action')
<a href="{{ route('petugas.index') }}" class="btn-secondary">
    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
    </svg>
    Kembali
</a>
@endsection

@section('content')
<div class="form-card">
    <div class="form-card-header">
        <div style="display:flex;align-items:center;gap:12px;">
            <div class="avatar avatar-violet">{{ strtoupper(substr($petugas->nama_petugas, 0, 2)) }}</div>
            <div>
                <h3>{{ $petugas->nama_petugas }}</h3>
                <p>NIP {{ $petugas->nip }} · Edit Data</p>
            </div>
        </div>
    </div>
    <div class="form-body">
        <form method="POST" action="{{ route('petugas.update', $petugas->id) }}">
            @csrf @method('PUT')
            <div class="form-group">
                <label>NIP <span class="req">*</span></label>
                <input type="text" name="nip" value="{{ old('nip', $petugas->nip) }}" required>
                @error('nip') <div class="error-msg"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3.75m9.303 3.376a12 12 0 11-15.94-15.94 12 12 0 0115.94 15.94z" />
                    </svg>{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label>Nama Lengkap <span class="req">*</span></label>
                <input type="text" name="nama_petugas" value="{{ old('nama_petugas', $petugas->nama_petugas) }}" required>
                @error('nama_petugas') <div class="error-msg"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3.75m9.303 3.376a12 12 0 11-15.94-15.94 12 12 0 0115.94 15.94z" />
                    </svg>{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label>No. Telepon <span class="req">*</span></label>
                <input type="text" name="no_telp" value="{{ old('no_telp', $petugas->no_telp) }}" required>
                @error('no_telp') <div class="error-msg"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3.75m9.303 3.376a12 12 0 11-15.94-15.94 12 12 0 0115.94 15.94z" />
                    </svg>{{ $message }}</div> @enderror
            </div>
            <div class="form-actions">
                <button type="submit" class="btn-primary"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg> Simpan Perubahan</button>
                <a href="{{ route('petugas.index') }}" class="btn-secondary">Batalkan</a>
            </div>
        </form>
    </div>
</div>
@endsection