@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">➕ Tambah Stok Mobil</h3>
        <a href="{{ route('admin.listings.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-2"></i>Kembali
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form action="{{ route('admin.listings.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Judul Iklan</label>
                        <input type="text" name="title" class="form-control" placeholder="Cth: Toyota Fortuner VRZ 2021" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Merk (Brand)</label>
                        <select name="brand" class="form-select">
                            <option value="Toyota">Toyota</option>
                            <option value="Honda">Honda</option>
                            <option value="Daihatsu">Daihatsu</option>
                            <option value="Mitsubishi">Mitsubishi</option>
                            <option value="Suzuki">Suzuki</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Harga Jual (Rp)</label>
                        <input type="number" name="price" class="form-control" placeholder="Cth: 450000000" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Tahun</label>
                        <input type="number" name="year" class="form-control" placeholder="Cth: 2021" required>
                    </div>

                    <div class="col-12 mb-3">
                        <label class="form-label fw-bold">Deskripsi Singkat</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Kondisi mobil, pajak, dll..."></textarea>
                    </div>

                    <div class="col-12 mb-4">
                        <label class="form-label fw-bold">Foto Mobil</label>
                        <input type="file" name="image" class="form-control" accept="image/*">
                        <div class="form-text">Format JPG/PNG, Max 2MB.</div>
                    </div>
                </div>

                <button type="submit" class="btn btn-success px-4 py-2 fw-bold">
                    <i class="bi bi-save me-2"></i>Simpan Mobil
                </button>
            </form>
        </div>
    </div>
@endsection