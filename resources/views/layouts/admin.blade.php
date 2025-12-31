<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Nusantara Mobil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { min-height: 100vh; display: flex; }
        .sidebar { 
            width: 260px; 
            background: #212529; 
            color: white; 
            min-height: 100vh;
            flex-shrink: 0;
        }
        .sidebar a { 
            color: #adb5bd; 
            text-decoration: none; 
            display: block; 
            padding: 12px 20px; 
            border-left: 4px solid transparent;
            transition: 0.3s;
        }
        .sidebar a:hover, .sidebar a.active { 
            background: #343a40; 
            color: white; 
            border-left-color: #0d6efd;
        }
        .main-content { flex-grow: 1; background: #f8f9fa; padding: 30px; }
    </style>
</head>
<body>

    <div class="sidebar d-none d-md-block">
        <div class="p-4 text-center border-bottom border-secondary">
            <h4 class="fw-bold m-0"><i class="bi bi-speedometer2 me-2"></i>ADMIN</h4>
            <small class="text-muted">Nusantara Mobil</small>
        </div>
        
        <div class="py-3">
            <small class="text-uppercase text-secondary px-3 fw-bold" style="font-size: 0.7rem;">Menu Utama</small>
            
            <a href="{{ route('admin.index') }}" class="{{ request()->routeIs('admin.index') ? 'active' : '' }}">
                <i class="bi bi-grid-fill me-2"></i> Dashboard AI
            </a>
            
            <a href="{{ route('admin.listings.index') }}" class="{{ request()->routeIs('admin.listings*') ? 'active' : '' }}">
                <i class="bi bi-car-front-fill me-2"></i> Stok Mobil
            </a>

            <a href="{{ route('admin.settings.index') }}" class="{{ request()->routeIs('admin.settings*') ? 'active' : '' }}">
                <i class="bi bi-brush-fill me-2"></i> Tampilan Web
            </a>
        </div>

        <div class="mt-auto p-3 border-top border-secondary">
            <a href="{{ url('/') }}" target="_blank" class="bg-dark rounded mb-2 text-center">
                <i class="bi bi-globe me-2"></i>Lihat Website
            </a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-danger w-100 btn-sm">
                    <i class="bi bi-box-arrow-right me-2"></i>Logout
                </button>
            </form>
        </div>
    </div>

    <div class="main-content">
        <button class="btn btn-dark d-md-none mb-3">☰ Menu</button>
        
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </div>

</body>
</html>