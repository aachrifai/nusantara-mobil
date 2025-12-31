@extends('layouts.app')

@section('content')
<div class="hero-section position-relative" style="
    background: linear-gradient(to right, rgba(0,0,0,0.8), rgba(0,0,0,0.4)), 
    url('{{ !empty($settings['hero_image']) ? asset('storage/'.$settings['hero_image']) : 'https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?auto=format&fit=crop&q=80' }}'); 
    background-size: cover; background-position: center; color: white; padding: 140px 0 100px 0;">
    
    <div class="container position-relative z-1">
        <span class="badge bg-danger mb-3 px-3 py-2 rounded-1">DEALER TERPERCAYA</span>
        <h1 class="display-3 fw-bold fst-italic text-uppercase">{{ $settings['hero_title'] ?? 'Nusantara Mobil' }}</h1>
        <p class="lead mb-4" style="max-width: 600px;">{{ $settings['hero_subtitle'] ?? 'Pusat Jual Beli Mobil Berkualitas dengan Teknologi AI' }}</p>
        
        <div class="d-flex gap-3">
            <a href="#stok" class="btn btn-light btn-lg rounded-1 fw-bold px-4">Lihat Koleksi</a>
            <a href="{{ url('/cek-harga') }}" class="btn btn-outline-light btn-lg rounded-1 fw-bold px-4">
                <i class="bi bi-robot me-2"></i>Cek Harga AI
            </a>
        </div>
    </div>
</div>

<div class="container position-relative z-2" style="margin-top: -50px;">
    <div class="card border-0 shadow-lg rounded-4 p-4 bg-white">
        <form action="{{ route('home') }}" method="GET">
            <div class="row g-3 align-items-end">
                <div class="col-md-4">
                    <label class="form-label fw-bold text-uppercase small text-muted">Cari Mobil</label>
                    <input type="text" name="keyword" class="form-control form-control-lg bg-light border-0" 
                           placeholder="Cth: Fortuner, Civic..." value="{{ request('keyword') }}">
                </div>
                
                <div class="col-md-3">
                    <label class="form-label fw-bold text-uppercase small text-muted">Merk</label>
                    <select name="brand" class="form-select form-select-lg bg-light border-0">
                        <option value="">Semua Merk</option>
                        @foreach(['Toyota', 'Honda', 'Daihatsu', 'Mitsubishi', 'Suzuki'] as $b)
                            <option value="{{ $b }}" {{ request('brand') == $b ? 'selected' : '' }}>{{ $b }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label fw-bold text-uppercase small text-muted">Harga Maksimal</label>
                    <select name="price_max" class="form-select form-select-lg bg-light border-0">
                        <option value="">Tidak Dibatasi</option>
                        <option value="150000000" {{ request('price_max') == '150000000' ? 'selected' : '' }}>< Rp 150 Juta</option>
                        <option value="300000000" {{ request('price_max') == '300000000' ? 'selected' : '' }}>< Rp 300 Juta</option>
                        <option value="500000000" {{ request('price_max') == '500000000' ? 'selected' : '' }}>< Rp 500 Juta</option>
                    </select>
                </div>

                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100 btn-lg fw-bold rounded-1">
                        <i class="bi bi-search me-1"></i> CARI
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="container py-5" id="stok">
    <div class="d-flex justify-content-between align-items-end mb-5 pt-4">
        <div>
            <h2 class="fw-bold text-uppercase mb-0">Stok Unit <span class="text-primary">Terbaru</span></h2>
            <div style="width: 50px; height: 4px; background: var(--primary-color); margin-top: 10px;"></div>
        </div>
    </div>

    <div class="row g-4">
        @forelse($listings as $car)
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm rounded-3 overflow-hidden group-hover-card">
                
                <div class="position-relative">
                    <img src="{{ $car->image ? asset('storage/'.$car->image) : 'https://via.placeholder.com/400x250?text=Mobil+Nusantara' }}" 
                         class="card-img-top" 
                         style="height: 240px; object-fit: cover; {{ $car->status == 'Terjual' ? 'filter: grayscale(100%);' : '' }}">
                    
                    <span class="position-absolute top-0 end-0 bg-primary text-white px-3 py-1 m-3 rounded-pill small fw-bold shadow">
                        {{ $car->year }}
                    </span>

                    @if($car->status == 'Terjual')
                        <div class="position-absolute top-50 start-50 translate-middle bg-danger text-white px-4 py-2 rounded-1 shadow fw-bold border border-white border-2" 
                             style="transform: translate(-50%, -50%) rotate(-15deg) !important; font-size: 1.5rem; opacity: 0.9; z-index: 10;">
                            SOLD OUT
                        </div>
                    @endif
                </div>
                
                <div class="card-body">
                    <small class="text-uppercase text-muted fw-bold">{{ $car->brand }}</small>
                    
                    <h5 class="card-title fw-bold mt-1 {{ $car->status == 'Terjual' ? 'text-decoration-line-through text-muted' : '' }}">
                        {{ $car->title }}
                    </h5>
                    
                    <h4 class="text-primary fw-bold my-3">Rp {{ number_format($car->price, 0, ',', '.') }}</h4>
                    
                    <div class="d-grid gap-2">
                        @if($car->status == 'Tersedia')
                            <a href="{{ route('mobil.detail', $car->id) }}" class="btn btn-primary btn-sm fw-bold rounded-1">
                                Lihat Detail & Simulasi
                            </a>
                            <a href="https://wa.me/628123456789?text=Minat {{ $car->title }}" class="btn btn-outline-dark btn-sm rounded-1">
                                <i class="bi bi-whatsapp me-2"></i>Hubungi Dealer
                            </a>
                        @else
                            <button class="btn btn-secondary btn-sm fw-bold rounded-1" disabled>
                                <i class="bi bi-lock-fill me-2"></i>Unit Sudah Laku
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5 bg-white rounded shadow-sm">
            <i class="bi bi-search display-1 text-muted"></i>
            <h4 class="mt-3 fw-bold">Mobil tidak ditemukan.</h4>
            <p class="text-muted">Coba ganti kata kunci atau reset filter pencarian Anda.</p>
            <a href="{{ route('home') }}" class="btn btn-outline-primary rounded-pill mt-2">Reset Pencarian</a>
        </div>
        @endforelse
    </div>
</div>

<div class="bg-dark text-white py-5 mt-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h2 class="fw-bold fst-italic">PUNYA MOBIL LAMA?</h2>
                <p class="mb-0 text-white-50">Gunakan teknologi Artificial Intelligence kami untuk mendapatkan estimasi harga pasar mobil Anda dalam hitungan detik.</p>
            </div>
            <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                <a href="{{ url('/cek-harga') }}" class="btn btn-primary btn-lg rounded-1 px-5 fw-bold shadow">
                    COBA PREDIKSI SEKARANG <i class="bi bi-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection