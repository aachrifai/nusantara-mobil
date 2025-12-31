@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            
            <div class="mb-3">
                <a href="{{ url('/') }}" class="text-decoration-none text-muted fw-bold">
                    <i class="bi bi-arrow-left me-1"></i> Kembali ke Showroom
                </a>
            </div>

            <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                <div class="card-header text-white text-center p-4 position-relative" style="background: linear-gradient(135deg, #004aad, #002855);">
                    <i class="bi bi-cpu fs-1 mb-2 d-block opacity-50"></i>
                    <h2 class="fw-bold mb-0">AI Price Estimator</h2>
                    <p class="mb-0 small opacity-75 letter-spacing-1">TEKNOLOGI PREDIKSI HARGA CERDAS</p>
                </div>

                <div class="card-body p-5 bg-white">
                    
                    @if(session('success'))
                        <div class="alert alert-success text-center border-0 bg-success-subtle mb-4">
                            <h6 class="text-uppercase fw-bold text-success mb-1">Estimasi Harga Pasar</h6>
                            <h1 class="fw-bold display-4 text-success mb-0">{{ session('success') }}</h1>
                        </div>
                    @endif

                    <div class="text-center mb-4">
                        <img id="carImage" src="" class="img-fluid rounded shadow-sm" style="display:none; max-height:250px; width: 100%; object-fit: cover;">
                        <p id="disclaimerText" class="text-muted small mt-2 fst-italic" style="display:none;">
                            <i class="bi bi-info-circle me-1"></i>Gambar hanya ilustrasi
                        </p>
                    </div>

                    <form action="{{ route('predict.process') }}" method="POST">
                        @csrf
                        
                        <div class="row g-3">
                            <div class="col-12 mb-2">
                                <label class="form-label fw-bold text-uppercase small text-muted">Model Mobil</label>
                                <select name="model_mobil" id="modelSelect" class="form-select form-select-lg bg-light border-0" required>
                                    <option value="" disabled selected>-- Pilih Model Toyota --</option>
                                    @foreach($specs as $model => $details)
                                        <option value="{{ $model }}" {{ old('model_mobil') == $model ? 'selected' : '' }}>
                                            {{ $model }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 mb-2">
                                <label class="form-label fw-bold text-uppercase small text-muted">Tahun Produksi</label>
                                <input type="number" name="tahun" class="form-control form-control-lg bg-light border-0" placeholder="Thn" value="{{ old('tahun') }}" required>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label class="form-label fw-bold text-uppercase small text-muted">Odometer (KM)</label>
                                <input type="number" name="km" class="form-control form-control-lg bg-light border-0" placeholder="Km" value="{{ old('km') }}" required>
                            </div>

                            <div class="col-12 mb-2">
                                <label class="form-label fw-bold text-uppercase small text-muted">Transmisi</label>
                                <select name="transmisi" id="transSelect" class="form-select form-select-lg bg-light border-0" required>
                                    <option value="" disabled selected>-- Pilih Model Dulu --</option>
                                </select>
                            </div>

                            <div class="col-12 mb-4">
                                <label class="form-label fw-bold text-uppercase small text-muted">Bahan Bakar</label>
                                <select name="bensin" id="fuelSelect" class="form-select form-select-lg bg-light border-0" required>
                                    <option value="" disabled selected>-- Pilih Model Dulu --</option>
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-3 fw-bold rounded-1 text-uppercase shadow-sm" style="background-color: #004aad;">
                            <i class="bi bi-calculator me-2"></i>Hitung Estimasi Harga
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Copy JavaScript lama Anda DISINI (Variable carSpecs, event listener, dll)
    // Script tidak berubah, hanya tampilan HTML di atas yang berubah.
    const carSpecs = @json($specs);
    const modelSelect = document.getElementById('modelSelect');
    const transSelect = document.getElementById('transSelect');
    const fuelSelect = document.getElementById('fuelSelect');
    const carImage = document.getElementById('carImage');
    const disclaimerText = document.getElementById('disclaimerText');

    modelSelect.addEventListener('change', function() {
        const selectedModel = this.value;
        const data = carSpecs[selectedModel];
        
        if (data && data.image) {
            carImage.src = data.image;
            carImage.style.display = 'block';
            disclaimerText.style.display = 'block';
        } else {
            carImage.style.display = 'none';
            disclaimerText.style.display = 'none';
        }

        transSelect.innerHTML = '<option value="" disabled selected>-- Pilih Transmisi --</option>';
        if (data && data.trans) {
            data.trans.forEach(t => { transSelect.innerHTML += `<option value="${t}">${t}</option>`; });
            transSelect.disabled = false;
        }

        fuelSelect.innerHTML = '<option value="" disabled selected>-- Pilih Bahan Bakar --</option>';
        if (data && data.fuel) {
            data.fuel.forEach(f => { fuelSelect.innerHTML += `<option value="${f}">${f}</option>`; });
            fuelSelect.disabled = false;
        }
    });
</script>
@endpush
@endsection