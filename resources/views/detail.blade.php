@extends('layouts.app')

@section('content')
<div class="container py-5">
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $car->title }}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
                <img src="{{ $car->image ? asset('storage/'.$car->image) : 'https://via.placeholder.com/800x500' }}" 
                     class="img-fluid w-100" style="object-fit: cover; max-height: 500px;">
                <div class="card-body p-4">
                    <h2 class="fw-bold mb-3">{{ $car->title }}</h2>
                    <div class="d-flex gap-3 mb-4">
                        <span class="badge bg-light text-dark border px-3 py-2"><i class="bi bi-calendar me-2"></i>{{ $car->year }}</span>
                        <span class="badge bg-light text-dark border px-3 py-2"><i class="bi bi-tag me-2"></i>{{ $car->brand }}</span>
                        <span class="badge bg-success px-3 py-2">Tersedia</span>
                    </div>
                    
                    <h5 class="fw-bold">Deskripsi Kendaraan</h5>
                    <p class="text-muted" style="line-height: 1.8;">
                        {{ $car->description ?? 'Tidak ada deskripsi tersedia untuk mobil ini.' }}
                    </p>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-body p-4">
                    <small class="text-muted fw-bold text-uppercase">Harga Cash</small>
                    <h2 class="text-primary fw-bold mb-3">Rp {{ number_format($car->price, 0, ',', '.') }}</h2>
                    
                    <div class="d-grid gap-2">
                        <a href="https://wa.me/628123456789?text=Halo, saya tertarik dengan mobil {{ $car->title }} seharga Rp {{ number_format($car->price) }}" 
                           class="btn btn-success fw-bold py-2" target="_blank">
                            <i class="bi bi-whatsapp me-2"></i>Hubungi via WhatsApp
                        </a>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-4 bg-dark text-white">
                <div class="card-header bg-transparent border-secondary p-3">
                    <h5 class="m-0 fw-bold"><i class="bi bi-calculator me-2"></i>Simulasi Cicilan</h5>
                </div>
                <div class="card-body p-4">
                    <div class="mb-3">
                        <label class="form-label small text-uppercase fw-bold text-white-50">Uang Muka (DP) - 20%</label>
                        <input type="range" class="form-range" id="dpRange" min="20" max="50" step="5" value="20">
                        <div class="d-flex justify-content-between">
                            <span id="dpPercent">20%</span>
                            <span id="dpAmount" class="fw-bold">Rp 0</span>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label small text-uppercase fw-bold text-white-50">Jangka Waktu (Tenor)</label>
                        <select class="form-select form-select-sm bg-secondary text-white border-0" id="tenorSelect">
                            <option value="12">1 Tahun (12 Bulan)</option>
                            <option value="24">2 Tahun (24 Bulan)</option>
                            <option value="36" selected>3 Tahun (36 Bulan)</option>
                            <option value="48">4 Tahun (48 Bulan)</option>
                            <option value="60">5 Tahun (60 Bulan)</option>
                        </select>
                    </div>

                    <hr class="border-secondary">

                    <div class="text-center">
                        <small class="text-white-50">Estimasi Cicilan per Bulan</small>
                        <h2 class="fw-bold text-warning mb-0" id="monthlyInstallment">Rp 0</h2>
                        <small class="text-muted" style="font-size: 0.7rem;">*Bunga estimasi 8%/tahun. Syarat & ketentuan berlaku.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <h4 class="fw-bold mb-4">Mobil Lainnya</h4>
        <div class="row">
            @foreach($recommendations as $rec)
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <img src="{{ $rec->image ? asset('storage/'.$rec->image) : 'https://via.placeholder.com/400x250' }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h6 class="fw-bold">{{ $rec->title }}</h6>
                        <p class="text-primary fw-bold mb-0">Rp {{ number_format($rec->price) }}</p>
                        <a href="{{ route('mobil.detail', $rec->id) }}" class="stretched-link"></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@push('scripts')
<script>
    const carPrice = {{ $car->price }};
    const dpRange = document.getElementById('dpRange');
    const dpPercent = document.getElementById('dpPercent');
    const dpAmount = document.getElementById('dpAmount');
    const tenorSelect = document.getElementById('tenorSelect');
    const monthlyDisplay = document.getElementById('monthlyInstallment');

    function calculateCredit() {
        // 1. Hitung DP
        let percent = dpRange.value;
        let dpValue = carPrice * (percent / 100);
        
        // Update Tampilan DP
        dpPercent.innerText = percent + "%";
        dpAmount.innerText = "Rp " + new Intl.NumberFormat('id-ID').format(dpValue);

        // 2. Hitung Pokok Hutang
        let loanAmount = carPrice - dpValue;

        // 3. Hitung Bunga (Flat 8% per tahun)
        let months = parseInt(tenorSelect.value);
        let years = months / 12;
        let interestRate = 0.08; // 8% Bunga
        
        let totalInterest = loanAmount * interestRate * years;
        let totalLoan = loanAmount + totalInterest;
        
        // 4. Cicilan per Bulan
        let monthly = totalLoan / months;

        // Update Tampilan Cicilan
        monthlyDisplay.innerText = "Rp " + new Intl.NumberFormat('id-ID').format(Math.round(monthly));
    }

    // Jalankan saat ada perubahan
    dpRange.addEventListener('input', calculateCredit);
    tenorSelect.addEventListener('change', calculateCredit);

    // Jalankan pertama kali
    calculateCredit();
</script>
@endpush
@endsection