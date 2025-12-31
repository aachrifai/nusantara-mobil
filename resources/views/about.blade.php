@extends('layouts.app')

@section('content')
<div class="bg-dark text-white position-relative overflow-hidden" style="padding: 80px 0;">
    <div class="position-absolute top-0 start-0 w-100 h-100" 
         style="background: url('https://images.unsplash.com/photo-1560179707-f14e90ef3dab?auto=format&fit=crop&q=80') center/cover; opacity: 0.2;"></div>
    <div class="container position-relative z-1 text-center">
        <h1 class="display-4 fw-bold fst-italic">TENTANG KAMI</h1>
        <p class="lead text-white-50">Mengenal lebih dekat Nusantara Mobil</p>
    </div>
</div>

<div class="container py-5">
    <div class="row align-items-center mb-5">
        <div class="col-lg-6 mb-4 mb-lg-0">
            <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?auto=format&fit=crop&q=80" 
                 class="img-fluid rounded-4 shadow-lg" alt="Tim Nusantara Mobil">
        </div>
        
        <div class="col-lg-6 ps-lg-5">
            <span class="text-primary fw-bold text-uppercase">Siapa Kami?</span>
            <h2 class="fw-bold mb-4">Dealer Mobil Bekas Terpercaya Sejak 2015</h2>
            <p class="text-muted" style="line-height: 1.8;">
                Nusantara Mobil didirikan dengan satu visi sederhana: mengubah cara orang membeli mobil bekas. Kami percaya bahwa membeli mobil seken tidak harus rumit atau penuh kekhawatiran.
            </p>
            <p class="text-muted" style="line-height: 1.8;">
                Dengan integrasi teknologi <strong>Artificial Intelligence (AI)</strong>, kami menjadi pelopor dealer modern yang memberikan transparansi harga yang adil, akurat, dan berbasis data. Tidak ada lagi tebak-tebakan harga.
            </p>
            
            <div class="row mt-4">
                <div class="col-6">
                    <h3 class="fw-bold text-primary">{{ $settings['units_sold'] ?? '1000+' }}</h3>
                    <p class="small text-muted">Unit Terjual</p>
                </div>
                <div class="col-6">
                    <h3 class="fw-bold text-primary">{{ $settings['customer_satisfaction'] ?? '98%' }}</h3>
                    <p class="small text-muted">Kepuasan Pelanggan</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm p-4 text-center rounded-4 hover-top">
                <div class="text-primary mb-3">
                    <i class="bi bi-shield-check display-4"></i>
                </div>
                <h5 class="fw-bold">Jaminan Kualitas</h5>
                <p class="text-muted small">Setiap mobil melewati 150+ titik inspeksi ketat. Bebas banjir dan bebas tabrakan besar.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm p-4 text-center rounded-4 hover-top">
                <div class="text-primary mb-3">
                    <i class="bi bi-cpu display-4"></i>
                </div>
                <h5 class="fw-bold">Teknologi AI</h5>
                <p class="text-muted small">Sistem penetapan harga berbasis AI memastikan Anda mendapatkan harga pasar yang paling wajar.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm p-4 text-center rounded-4 hover-top">
                <div class="text-primary mb-3">
                    <i class="bi bi-file-earmark-text display-4"></i>
                </div>
                <h5 class="fw-bold">Dokumen Lengkap</h5>
                <p class="text-muted small">Legalitas terjamin. BPKB, STNK, dan Faktur diverifikasi keasliannya oleh tim legal kami.</p>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow overflow-hidden rounded-4">
        <div class="row g-0">
            <div class="col-lg-4 bg-dark text-white p-5 d-flex flex-column justify-content-center">
                <h3 class="fw-bold mb-4">Kunjungi Showroom</h3>
                
                <div class="d-flex mb-3">
                    <i class="bi bi-geo-alt-fill text-primary me-3 fs-5"></i>
                    <div>
                        <h6 class="fw-bold mb-1">Alamat Pusat</h6>
                        <p class="text-white-50 small mb-0">
                            {!! nl2br(e($settings['company_address'] ?? 'Alamat belum diatur di Admin')) !!}
                        </p>
                    </div>
                </div>

                <div class="d-flex mb-3">
                    <i class="bi bi-clock-fill text-primary me-3 fs-5"></i>
                    <div>
                        <h6 class="fw-bold mb-1">Jam Operasional</h6>
                        <p class="text-white-50 small mb-0">
                            {!! nl2br(e($settings['company_hours'] ?? 'Jam belum diatur di Admin')) !!}
                        </p>
                    </div>
                </div>

                <div class="d-flex">
                    <i class="bi bi-whatsapp text-primary me-3 fs-5"></i>
                    <div>
                        <h6 class="fw-bold mb-1">Hubungi Kami</h6>
                        <p class="text-white-50 small mb-0">
                            {{ $settings['company_phone'] ?? '0812-3456-7890' }} (WhatsApp)
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-8">
                <div class="ratio ratio-16x9 h-100">
                    @if(!empty($settings['company_map']))
                        {!! $settings['company_map'] !!}
                    @else
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.521260322283!2d106.81956135000001!3d-6.194741399999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5390917b759%3A0x6b45e67356080477!2sBundaran%20HI!5e0!3m2!1sid!2sid!4v1635825365287!5m2!1sid!2sid" 
                                width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection