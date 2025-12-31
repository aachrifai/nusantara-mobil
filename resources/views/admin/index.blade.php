@extends('layouts.admin') 

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold m-0">📊 Dashboard Overview</h2>
            <p class="text-muted m-0">Ringkasan aktivitas dealer hari ini.</p>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-md-3">
            <div class="card bg-primary text-white border-0 shadow-sm rounded-3">
                <div class="card-body">
                    <h6 class="text-uppercase text-white-50 small fw-bold">Total Unit Masuk</h6>
                    <h2 class="fw-bold mb-0">{{ $stats['total_mobil'] }} <span class="fs-6">Mobil</span></h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-success text-white border-0 shadow-sm rounded-3">
                <div class="card-body">
                    <h6 class="text-uppercase text-white-50 small fw-bold">Ready Stock</h6>
                    <h2 class="fw-bold mb-0">{{ $stats['total_tersedia'] }} <span class="fs-6">Unit</span></h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-danger text-white border-0 shadow-sm rounded-3">
                <div class="card-body">
                    <h6 class="text-uppercase text-white-50 small fw-bold">Unit Terjual (Sold)</h6>
                    <h2 class="fw-bold mb-0">{{ $stats['total_terjual'] }} <span class="fs-6">Unit</span></h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-warning text-dark border-0 shadow-sm rounded-3">
                <div class="card-body">
                    <h6 class="text-uppercase text-dark-50 small fw-bold">Estimasi Aset Ready</h6>
                    <h4 class="fw-bold mb-0">Rp {{ number_format($stats['total_aset'], 0, ',', '.') }}</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold">🤖 Data Training AI (Price Predictor)</h4>
        <a href="{{ route('admin.create') }}" class="btn btn-dark btn-sm">
            <i class="bi bi-plus-lg me-2"></i>Tambah Data AI
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="px-4 py-3">Foto</th>
                            <th class="px-4 py-3">Model Mobil</th>
                            <th class="px-4 py-3">Opsi Transmisi</th>
                            <th class="px-4 py-3">Opsi Bahan Bakar</th>
                            <th class="px-4 py-3 text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cars as $car)
                        <tr>
                            <td class="px-4">
                                @if($car->image)
                                    <img src="{{ asset('storage/' . $car->image) }}" width="60" class="rounded border">
                                @else
                                    <span class="badge bg-secondary">No Img</span>
                                @endif
                            </td>
                            <td class="px-4 fw-bold">{{ $car->model_name }}</td>
                            <td class="px-4">
                                @foreach($car->transmisi_options as $t)
                                    <span class="badge bg-info text-dark me-1">{{ $t }}</span>
                                @endforeach
                            </td>
                            <td class="px-4">
                                @foreach($car->fuel_options as $f)
                                    <span class="badge bg-warning text-dark me-1">{{ $f }}</span>
                                @endforeach
                            </td>
                            <td class="px-4 text-end">
                                <a href="{{ route('admin.edit', $car->id) }}" class="btn btn-sm btn-warning me-1">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.destroy', $car->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection