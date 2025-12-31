@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">➕ Tambah Data AI Baru</h3>
        <a href="{{ route('admin.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-2"></i>Kembali
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            
            <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label class="form-label fw-bold">Nama Model Mobil</label>
                        <input type="text" name="model_name" class="form-control" placeholder="Contoh: Fortuner" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Opsi Transmisi</label>
                        <input type="text" name="transmisi" class="form-control" placeholder="Contoh: Manual, Automatic" required>
                        <div class="form-text text-primary">⚠️ Wajib pisahkan dengan koma (,)</div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Opsi Bahan Bakar</label>
                        <input type="text" name="bensin" class="form-control" placeholder="Contoh: Diesel, Petrol" required>
                        <div class="form-text text-primary">⚠️ Wajib pisahkan dengan koma (,)</div>
                    </div>

                    <div class="col-12 mb-4">
                        <label class="form-label fw-bold">Foto Mobil (Opsional)</label>
                        <input type="file" name="image" class="form-control" accept="image/*">
                    </div>
                </div>

                <button type="submit" class="btn btn-success px-4 py-2 fw-bold">
                    <i class="bi bi-save me-2"></i>Simpan Data
                </button>
            </form>
        </div>
    </div>
@endsection