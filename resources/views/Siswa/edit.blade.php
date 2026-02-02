@extends('layouts.app')

@section('title', 'Edit Data Siswa')

@section('content')
<section class="max-w-3xl mx-auto bg-gradient-to-br from-blue-50 to-purple-50 rounded-3xl shadow-xl p-6 mt-10">
    <h1 class="text-3xl font-bold text-blue-600 mb-6 text-center">
        Edit Data Siswa
    </h1>

    <form method="POST" action="{{ route('siswa.update', $siswa->id) }}" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
            <input type="text" name="nama" value="{{ $siswa->nama }}"
                class="w-full border border-gray-300 p-3 rounded-xl focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Kelas</label>
            <input type="text" name="kelas" value="{{ $siswa->kelas }}"
                class="w-full border border-gray-300 p-3 rounded-xl focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Wali Kelas</label>
            <select name="guru_id"
                class="w-full border border-gray-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 bg-white">
                @foreach ($gurus as $guru)
                    <option value="{{ $guru->id }}"
                        {{ $siswa->guru_id == $guru->id ? 'selected' : '' }}>
                        {{ $guru->nama }} - {{ $guru->mapel }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex gap-3 pt-4">
            <button type="submit"
                class="flex-1 bg-gradient-to-r from-blue-600 to-purple-600 text-white py-3 rounded-xl font-semibold hover:shadow-lg transition">
                Update Data
            </button>

            <a href="{{ route('siswa.index') }}"
                class="flex-1 text-center bg-gray-200 text-gray-700 py-3 rounded-xl font-semibold hover:bg-gray-300 transition">
                Batal
            </a>
        </div>
    </form>
</section>
@endsection
