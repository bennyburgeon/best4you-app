<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Best4You') | Recruitment & HR Solutions</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
            color: #2d3748;
            background-color: #f8fafc;
        }
        .navbar {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,.08);
        }
        .btn-primary {
            background-color: #696cff;
            border-color: #696cff;
        }
        .btn-primary:hover {
            background-color: #5f61e6;
            border-color: #5f61e6;
        }
        footer {
            background-color: #1a202c;
            color: #cbd5e0;
            padding: 4rem 0 2rem;
        }
    </style>
    @stack('styles')
</head>
<body>
    <nav class="navbar navbar-expand-lg sticky-top py-3">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="/">Best4You</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/jobs">Find Jobs</a></li>
                    <li class="nav-item"><a class="nav-link" href="/about">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="/services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
                    <li class="nav-item ms-lg-3">
                        <a href="/upload-resume" class="btn btn-outline-primary rounded-pill px-4">Upload Resume</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5 class="text-white mb-3">Best4You</h5>
                    <p>Your partner in finding the best talent and the perfect career opportunities.</p>
                </div>
                <div class="col-md-2 mb-4">
                    <h6 class="text-white mb-3">Quick Links</h6>
                    <ul class="list-unstyled">
                        <li><a href="/jobs" class="text-decoration-none text-reset">Jobs</a></li>
                        <li><a href="/about" class="text-decoration-none text-reset">About</a></li>
                        <li><a href="/contact" class="text-decoration-none text-reset">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h6 class="text-white mb-3">Contact Us</h6>
                    <p><i class="bi bi-geo-alt me-2"></i> 123 Business Way, City</p>
                    <p><i class="bi bi-envelope me-2"></i> info@best4you.com</p>
                </div>
            </div>
            <hr class="mt-4 border-secondary">
            <div class="text-center mt-3">
                <p>&copy; {{ date('Y') }} Best4You. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
