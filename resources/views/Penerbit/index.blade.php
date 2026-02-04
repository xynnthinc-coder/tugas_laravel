@extends('layouts.app')
@section('title', 'Data Penerbit')
@section('page-title', 'Penerbit')
@section('page-sub', 'Kelola seluruh data penerbit buku')
@section('topbar-action')
<a href="{{ route('penerbit.create') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl text-sm font-semibold transition-colors shadow-lg shadow-indigo-500/30"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
    </svg>Tambah Penerbit</a>
@endsection
@section('content')
<div class="bg-white rounded-2xl shadow-sm border border-gray-100">
    <div class="px-6 py-5 border-b border-gray-100 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <h3 class="text-lg font-semibold text-slate-900">Daftar Penerbit</h3><span class="px-3 py-1 bg-indigo-100 text-indigo-700 rounded-full text-sm font-medium">{{ $penerbits->count() }}</span>
        </div>
        <div class="relative"><svg class="w-5 h-5 absolute left-3 top-1/2 -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg><input type="text" placeholder="Cari penerbit..." oninput="filterTable('tablePenerbit', this.value)" class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"></div>
    </div>
    <div class="overflow-x-auto">
        <table id="tablePenerbit" class="w-full">
            <thead class="bg-gray-50 border-b border-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider w-12">#</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nama Penerbit</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Alamat</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">ISBN</th>
                    <th class="px-6 py-3 text-right text-xs font-semibold text-gray-600 uppercase tracking-wider w-24">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($penerbits as $i => $penerbit)
                <tr class="searchable-row hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 text-sm text-gray-500">{{ $i + 1 }}</td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-sky-100 rounded-lg flex items-center justify-center text-sky-600 font-bold text-sm">{{ strtoupper(substr($penerbit->nama_penerbit, 0, 2)) }}</div><span class="text-sm font-medium text-slate-900">{{ $penerbit->nama_penerbit }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-700">{{ $penerbit->alamat }}</td>
                    <td class="px-6 py-4"><code class="text-xs text-gray-700 font-mono">{{ $penerbit->isbn }}</code></td>
                    <td class="px-6 py-4">
                        <div class="flex items-center justify-end gap-2"><a href="{{ route('penerbit.edit', $penerbit->id) }}" class="p-2 text-indigo-600 hover:bg-indigo-50 rounded-lg transition-colors"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg></a>
                            <form method="POST" action="{{ route('penerbit.destroy', $penerbit->id) }}" id="delPenerbit{{ $penerbit->id }}">@csrf @method('DELETE')<button type="button" onclick="openConfirm(document.getElementById('delPenerbit{{ $penerbit->id }}'), '{{ $penerbit->nama_penerbit }}')" class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg></button></form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-16">
                        <div class="text-center">
                            <div class="w-16 h-16 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-4"><svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                                </svg></div>
                            <h4 class="text-lg font-semibold text-gray-900 mb-1">Belum ada data penerbit</h4>
                            <p class="text-sm text-gray-500">Tambahkan penerbit pertama menggunakan tombol di atas.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="px-6 py-4 border-t border-gray-100 text-sm text-gray-600">Menampilkan <span class="font-semibold text-gray-900">{{ $penerbits->count() }}</span> data penerbit</div>
</div>
<script>
    function filterTable(tableId, query) {
        const rows = document.getElementById(tableId).querySelectorAll('.searchable-row');
        const q = query.toLowerCase();
        rows.forEach(r => r.style.display = r.textContent.toLowerCase().includes(q) ? '' : 'none');
    }
</script>
@endsection