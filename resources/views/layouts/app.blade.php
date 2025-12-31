<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nusantara Mobil - Dealer & AI Pricing</title>
    
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" type="image/png">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@300;400;600;800&family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #004aad; 
            --accent-color: #e63946;  
            --dark-bg: #1a1a1a;       
        }
        body { 
            font-family: 'Inter', sans-serif; 
            background-color: #f4f6f9; 
            color: #333;
            /* PERBAIKAN: Ubah jadi 72px agar pas presisi dengan tinggi navbar */
            padding-top: 72px; 
        }
        h1, h2, h3, h4, h5, .btn {
            font-family: 'Exo 2', sans-serif; 
        }
        
        /* --- NAVBAR PRESISI --- */
        .navbar {
            background-color: #ffffff !important; 
            border-bottom: 3px solid var(--primary-color);
            /* Kunci tinggi navbar agar konsisten */
            height: 72px; 
            padding: 0; /* Reset padding bawaan bootstrap */
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }
        
        /* --- LOGO --- */
        .navbar-brand {
            padding: 0;
            margin-right: 1rem;
            display: flex;
            align-items: center;
            height: 100%; /* Agar vertikal center */
        }
        .navbar-brand img {
            max-height: 65px; /* Tinggi Logo */
            width: auto;
            filter: drop-shadow(0px 2px 2px rgba(0,0,0,0.15)); 
            transition: 0.3s;
        }
        .navbar-brand img:hover {
            transform: scale(1.03);
        }
        
        .nav-link {
            font-weight: 700;
            color: #333 !important;
            text-transform: uppercase;
            font-size: 0.9rem;
            margin-left: 20px;
        }
        .nav-link:hover {
            color: var(--primary-color) !important;
        }

        footer {
            background-color: var(--dark-bg);
            color: white;
            padding: 50px 0;
            margin-top: auto;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('img/logo.png') }}" alt="Nusantara Mobil Logo">
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Showroom</a></li>
                    
                    <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">Tentang Kami</a></li>
                    
                    @guest
                        <li class="nav-item">
                            <a class="btn btn-outline-dark btn-sm ms-3 rounded-pill px-3 fw-bold" href="{{ route('login') }}">
                                <i class="bi bi-person-lock me-1"></i> Admin Area
                            </a>
                        </li>
                    @else
                        <li class="nav-item dropdown ms-3">
                            <a class="nav-link dropdown-toggle btn btn-dark text-white rounded-pill px-4 py-1" href="#" role="button" data-bs-toggle="dropdown">
                                <i class="bi bi-person-circle me-1"></i> Admin
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                                <li><a class="dropdown-item" href="{{ route('admin.index') }}">Dashboard</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button class="dropdown-item text-danger">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer>
        <div class="container text-center">
            <h4 class="fw-bold fst-italic">NUSANTARA MOBIL</h4>
            <p class="small opacity-75">Partner Otomotif Terpercaya & Teknologi Prediksi Harga AI</p>
            <hr class="border-secondary my-4 opacity-25">
            <small>&copy; {{ date('Y') }} Nusantara Mobil. All rights reserved.</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>