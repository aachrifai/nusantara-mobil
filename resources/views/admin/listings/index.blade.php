@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">🚗 Manajemen Stok Mobil</h3>
        <a href="{{ route('admin.listings.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-2"></i>Tambah Mobil Jualan
        </a>
    </div>
    
    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="p-3">Foto</th>
                            <th class="p-3">Judul Iklan</th>
                            <th class="p-3">Harga</th>
                            <th class="p-3">Status</th>
                            <th class="p-3 text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($listings as $item)
                        <tr>
                            <td class="p-3">
                                <img src="{{ $item->image ? asset('storage/'.$item->image) : 'https://via.placeholder.com/100' }}" 
                                     width="80" class="rounded border" style="object-fit: cover; height: 50px;">
                            </td>
                            <td class="p-3">
                                <div class="fw-bold">{{ $item->title }}</div>
                                <small class="text-muted">{{ $item->brand }} • {{ $item->year }}</small>
                            </td>
                            <td class="p-3 fw-bold text-primary">
                                Rp {{ number_format($item->price, 0, ',', '.') }}
                            </td>
                            <td class="p-3">
                                <span class="badge bg-success">Tersedia</span>
                            </td>
                            <td class="p-3 text-end">
                                <a href="{{ route('admin.listings.edit', $item->id) }}" class="btn btn-sm btn-warning me-1" title="Edit Data">
                                    <i class="bi bi-pencil"></i>
                                </a>

                                <form action="{{ route('admin.listings.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus mobil ini dari stok?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" title="Hapus Data">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">
                                Belum ada mobil yang dijual. Klik tombol tambah di atas.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection