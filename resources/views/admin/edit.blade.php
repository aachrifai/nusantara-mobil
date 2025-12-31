@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">✏️ Edit Data AI</h3>
        <a href="{{ route('admin.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-2"></i>Kembali
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            
            <form action="{{ route('admin.update', $car->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') <div class="row">
                    <div class="col-md-12 mb-3">
                        <label class="form-label fw-bold">Nama Model Mobil</label>
                        <input type="text" name="model_name" class="form-control" value="{{ $car->model_name }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Opsi Transmisi</label>
                        <input type="text" name="transmisi" class="form-control" value="{{ $transString }}" required>
                        <div class="form-text text-primary">Pisahkan dengan koma (,)</div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Opsi Bahan Bakar</label>
                        <input type="text" name="bensin" class="form-control" value="{{ $fuelString }}" required>
                        <div class="form-text text-primary">Pisahkan dengan koma (,)</div>
                    </div>

                    <div class="col-12 mb-4">
                        <label class="form-label fw-bold">Foto Mobil</label>
                        
                        @if($car->image)
                            <div class="mb-2">
                                <img src="{{ asset('storage/'.$car->image) }}" width="120" class="rounded border">
                                <small class="text-muted d-block">Foto saat ini</small>
                            </div>
                        @endif

                        <input type="file" name="image" class="form-control" accept="image/*">
                        <div class="form-text">Biarkan kosong jika tidak ingin mengubah foto.</div>
                    </div>
                </div>

                <button type="submit" class="btn btn-warning px-4 py-2 fw-bold">
                    <i class="bi bi-save me-2"></i>Simpan Perubahan
                </button>
            </form>
        </div>
    </div>
@endsection