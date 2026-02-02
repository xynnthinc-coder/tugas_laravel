@extends('layouts.app')

@section('title', 'Edit Data Siswa')

@section('content')
<section class="max-w-3xl mx-auto bg-gradient-to-br from-blue-50 to-purple-50 rounded-3xl shadow-xl p-6 mt-10">
    <h1 class="text-3xl font-bold text-blue-600 mb-6 text-center">
        Edit Data buku
    </h1>

    <form method="POST" action="{{ route('buku.update', $buku->id) }}" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-7">Kode Buku</label>
            <input type="text" name="kode_buku" value="{{ $buku->kode_buku }}" id="kode_buku"
                class="w-full border border-gray-300 p-3 rounded-xl focus:ring-2 focus:ring-blue-500" readonly>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-7">Judul Buku</label>
            <input type="text" name="judul_buku" value="{{ $buku->judul_buku }}"
                class="w-full border border-gray-300 p-3 rounded-xl focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-7">Penulis</label>
            <select name="penulis_id" required
                class="w-full border border-gray-300 p-3 rounded-xl focus:ring-2 focus:ring-blue-500">
                @foreach ($penuliss as $penulis)
                    <option value="{{ $penulis->id }}" {{ $buku->penulis_id == $penulis->id ? 'selected' : '' }}>
                        {{ $penulis->nama_penulis }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-7">Penerbit</label>
            <select name="penerbit_id" required
                class="w-full border border-gray-300 p-3 rounded-xl focus:ring-2 focus:ring-blue-500">
                @foreach ($penerbits as $penerbit)
                    <option value="{{ $penerbit->id }}" {{ $buku->penerbit_id == $penerbit->id ? 'selected' : '' }}>
                        {{ $penerbit->nama_penerbit }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-7">Stok</label>
            <input type="number" name="stok" value="{{ $buku->stok }}" id="stok"
                class="w-full border border-gray-300 p-3 rounded-xl focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="flex gap-3 pt-4">
            <button type="submit"
                class="flex-1 bg-gradient-to-r from-blue-600 to-purple-600 text-white py-3 rounded-xl font-semibold hover:shadow-lg transition">
                Update Data
            </button>

            <a href="{{ route('buku.index') }}"
                class="flex-1 text-center bg-gray-200 text-gray-700 py-3 rounded-xl font-semibold hover:bg-gray-300 transition">
                Batal
            </a>
        </div>
    </form>
</section>
@endsection
