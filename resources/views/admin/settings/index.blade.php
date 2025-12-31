@extends('layouts.admin')

@section('content')
    <h3 class="fw-bold mb-4">🖼️ Pengaturan Tampilan Website</h3>
    
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3">
                    <h5 class="m-0 fw-bold">Edit Tampilan Halaman Depan</h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <h6 class="text-primary fw-bold mb-3"><i class="bi bi-image me-2"></i>Banner Utama</h6>
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Judul Utama (Hero Title)</label>
                            <input type="text" name="hero_title" class="form-control form-control-lg" 
                                   value="{{ $settings['hero_title'] ?? 'Nusantara Mobil' }}">
                            <div class="form-text">Teks besar yang muncul di tengah banner.</div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Sub-Judul (Subtitle)</label>
                            <input type="text" name="hero_subtitle" class="form-control" 
                                   value="{{ $settings['hero_subtitle'] ?? 'Dealer Terpercaya Anda' }}">
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Gambar Background Banner</label>
                            
                            @if(!empty($settings['hero_image']))
                                <div class="mb-2 p-2 border rounded bg-light d-inline-block">
                                    <img src="{{ asset('storage/'.$settings['hero_image']) }}" height="150" class="rounded">
                                    <div class="small text-muted mt-1 text-center">Gambar Aktif</div>
                                </div>
                            @endif

                            <input type="file" name="hero_image" class="form-control">
                            <div class="form-text">Disarankan ukuran 1600x900 pixel (Landscape).</div>
                        </div>

                        <hr class="my-4">

                        <h6 class="text-primary fw-bold mb-3"><i class="bi bi-graph-up me-2"></i>Statistik Perusahaan</h6>
                        
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Unit Terjual</label>
                                <input type="text" name="units_sold" class="form-control" 
                                       value="{{ $settings['units_sold'] ?? '50+' }}" 
                                       placeholder="Cth: 120+">
                                <div class="form-text small">Angka total penjualan mobil.</div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Kepuasan Pelanggan</label>
                                <input type="text" name="customer_satisfaction" class="form-control" 
                                       value="{{ $settings['customer_satisfaction'] ?? '98%' }}" 
                                       placeholder="Cth: 100%">
                                <div class="form-text small">Persentase kepuasan.</div>
                            </div>
                        </div>

                        <hr class="my-4">

                        <h6 class="text-primary fw-bold mb-3"><i class="bi bi-geo-alt me-2"></i>Lokasi Maps</h6>
                        
                        <div class="mb-4">
                            <label class="form-label fw-bold">Kode Google Maps (Embed HTML)</label>
                            <textarea name="company_map" class="form-control font-monospace small bg-light" rows="4" 
                                      placeholder='Contoh: <iframe src="https://www.google.com/maps/embed?pb=..." ...></iframe>'>{{ $settings['company_map'] ?? '' }}</textarea>
                            <div class="form-text">
                                Cara dapat kode: Buka Google Maps > Cari Lokasi > Share > Embed a map > Copy HTML.
                            </div>
                        </div>

                        <hr class="my-4">

                        <h6 class="text-primary fw-bold mb-3"><i class="bi bi-telephone me-2"></i>Informasi Kontak</h6>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Alamat Lengkap</label>
                            <textarea name="company_address" class="form-control" rows="2" 
                                      placeholder="Cth: Jl. Sudirman No. 1, Jakarta">{{ $settings['company_address'] ?? '' }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Jam Operasional</label>
                            <textarea name="company_hours" class="form-control" rows="2" 
                                      placeholder="Cth: Senin-Jumat: 08.00 - 17.00">{{ $settings['company_hours'] ?? '' }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Nomor WhatsApp / Telepon</label>
                            <input type="text" name="company_phone" class="form-control" 
                                   value="{{ $settings['company_phone'] ?? '' }}" placeholder="Cth: 0812-3456-7890">
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg fw-bold">
                                <i class="bi bi-save me-2"></i>Simpan Semua Perubahan
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="alert alert-info shadow-sm border-0">
                <h6 class="fw-bold"><i class="bi bi-info-circle me-2"></i>Catatan</h6>
                <p class="small mb-0">Pastikan menekan tombol <b>Simpan</b> setelah melakukan perubahan data. Gambar hero akan otomatis menggantikan yang lama.</p>
            </div>
        </div>
    </div>
@endsection