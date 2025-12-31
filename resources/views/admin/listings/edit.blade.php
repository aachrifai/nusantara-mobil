@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">✏️ Edit Stok Mobil</h3>
        <a href="{{ route('admin.listings.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-2"></i>Kembali
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            
            <form action="{{ route('admin.listings.update', $listing->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') 
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Judul Iklan</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title', $listing->title) }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Merk (Brand)</label>
                        <select name="brand" class="form-select">
                            @foreach(['Toyota', 'Honda', 'Daihatsu', 'Mitsubishi', 'Suzuki', 'Lainnya'] as $brand)
                                <option value="{{ $brand }}" {{ $listing->brand == $brand ? 'selected' : '' }}>{{ $brand }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Harga Jual (Rp)</label>
                        <input type="number" name="price" class="form-control" value="{{ old('price', $listing->price) }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Status Penjualan</label>
                        <select name="status" class="form-select bg-warning-subtle border-warning fw-bold text-dark">
                            <option value="Tersedia" {{ $listing->status == 'Tersedia' ? 'selected' : '' }}>🟢 Tersedia</option>
                            <option value="Terjual" {{ $listing->status == 'Terjual' ? 'selected' : '' }}>🔴 Terjual (Sold Out)</option>
                        </select>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label fw-bold">Tahun</label>
                        <input type="number" name="year" class="form-control" value="{{ old('year', $listing->year) }}" required>
                    </div>

                    <div class="col-12 mb-3">
                        <label class="form-label fw-bold">Deskripsi Singkat</label>
                        <textarea name="description" class="form-control" rows="3">{{ old('description', $listing->description) }}</textarea>
                    </div>

                    <div class="col-12 mb-4">
                        <label class="form-label fw-bold">Foto Mobil</label>
                        
                        @if($listing->image)
                            <div class="mb-2">
                                <img src="{{ asset('storage/'.$listing->image) }}" width="150" class="rounded border">
                                <small class="d-block text-muted">Foto saat ini</small>
                            </div>
                        @endif

                        <input type="file" name="image" class="form-control" accept="image/*">
                        <div class="form-text">Biarkan kosong jika tidak ingin mengganti foto.</div>
                    </div>
                </div>

                <button type="submit" class="btn btn-warning px-4 py-2 fw-bold">
                    <i class="bi bi-save me-2"></i>Simpan Perubahan
                </button>
            </form>
        </div>
    </div>
@endsection