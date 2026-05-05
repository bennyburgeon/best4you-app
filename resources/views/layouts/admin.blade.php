<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') | {{ config('app.name') }}</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        :root {
            --sidebar-width: 260px;
            --navbar-height: 70px;
            --primary-color: #696cff;
            --bg-color: #f5f5f9;
        }

        body {
            font-family: 'Public Sans', sans-serif;
            background-color: var(--bg-color);
            color: #566a7f;
            overflow-x: hidden;
        }

        .layout-wrapper {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        #sidebar {
            width: var(--sidebar-width);
            background: #fff;
            box-shadow: 0 0.125rem 0.25rem rgba(161, 172, 184, 0.4);
            z-index: 1000;
            transition: all 0.3s;
            position: fixed;
            height: 100vh;
        }

        .sidebar-header {
            padding: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .app-brand-text {
            font-size: 1.25rem;
            font-weight: 700;
            color: #566a7f;
            text-transform: uppercase;
            text-decoration: none;
        }

        .nav-link {
            padding: 0.625rem 1rem;
            margin: 0.125rem 1rem;
            border-radius: 0.375rem;
            color: #697a8d;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .nav-link:hover, .nav-link.active {
            background-color: rgba(105, 108, 255, 0.08);
            color: var(--primary-color);
        }

        .nav-link i {
            font-size: 1.2rem;
        }

        .nav-header {
            padding: 1.5rem 1rem 0.5rem 1rem;
            font-size: 0.75rem;
            font-weight: 500;
            color: #a1acb8;
            text-transform: uppercase;
        }

        /* Content Area */
        .content-wrapper {
            flex: 1;
            margin-left: var(--sidebar-width);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .navbar {
            height: var(--navbar-height);
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(6px);
            padding: 0 1.5rem;
            margin: 1rem 1.5rem 0 1.5rem;
            border-radius: 0.375rem;
            box-shadow: 0 0.125rem 0.25rem rgba(161, 172, 184, 0.4);
        }

        .content {
            padding: 1.5rem;
            flex: 1;
        }

        /* Card Styles */
        .card {
            border: none;
            box-shadow: 0 0.125rem 0.25rem rgba(161, 172, 184, 0.4);
            border-radius: 0.5rem;
        }

        .card-header {
            background-color: transparent;
            border-bottom: none;
            padding: 1.5rem;
        }

        @media (max-width: 992px) {
            #sidebar {
                margin-left: calc(-1 * var(--sidebar-width));
            }
            #sidebar.active {
                margin-left: 0;
            }
            .content-wrapper {
                margin-left: 0;
            }
        }
    </style>
    @stack('styles')
</head>
<body>
    <div class="layout-wrapper">
        <!-- Sidebar -->
        <aside id="sidebar">
            <div class="sidebar-header">
                <a href="{{ url('/admin') }}" class="app-brand-text">
                    Best4You
                </a>
            </div>

            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin') ? 'active' : '' }}" href="{{ url('/admin') }}">
                        <i class="bi bi-house-door"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <div class="nav-header">Modules</div>

                @can('view categories')
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/categories*') ? 'active' : '' }}" href="{{ url('/admin/categories') }}">
                        <i class="bi bi-list-ul"></i>
                        <span>Categories</span>
                    </a>
                </li>
                @endcan

                @can('view industry-types')
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/industry-types*') ? 'active' : '' }}" href="{{ url('/admin/industry-types') }}">
                        <i class="bi bi-briefcase"></i>
                        <span>Industry Types</span>
                    </a>
                </li>
                @endcan

                @can('view clients')
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/clients*') ? 'active' : '' }}" href="{{ url('/admin/clients') }}">
                        <i class="bi bi-building"></i>
                        <span>Clients</span>
                    </a>
                </li>
                @endcan

                @can('view jobs')
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/jobs*') ? 'active' : '' }}" href="{{ url('/admin/jobs') }}">
                        <i class="bi bi-briefcase"></i>
                        <span>Jobs</span>
                    </a>
                </li>
                @endcan

                @can('view applications')
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/applications*') ? 'active' : '' }}" href="{{ url('/admin/applications') }}">
                        <i class="bi bi-file-earmark"></i>
                        <span>Applications</span>
                    </a>
                </li>
                @endcan

                @can('view skills')
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/tools*') ? 'active' : '' }}" href="{{ url('/admin/tools') }}">
                        <i class="bi bi-wrench"></i>
                        <span>Skills</span>
                    </a>
                </li>
                @endcan

                @can('view currencies')
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/currencies*') ? 'active' : '' }}" href="{{ url('/admin/currencies') }}">
                        <i class="bi bi-cash-stack"></i>
                        <span>Currencies</span>
                    </a>
                </li>
                @endcan

                <div class="nav-header">Settings</div>

                @if(auth()->user()->can('view roles') || auth()->user()->can('view users'))
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/roles*') || request()->is('admin/users*') ? 'active' : '' }}" data-bs-toggle="collapse" href="#accessControl">
                        <i class="bi bi-shield-lock"></i>
                        <span>Access Control</span>
                        <i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <div class="collapse {{ request()->is('admin/roles*') || request()->is('admin/users*') ? 'show' : '' }}" id="accessControl">
                        <ul class="nav flex-column ms-4">
                            @can('view roles')
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('admin/roles*') ? 'active' : '' }}" href="{{ url('/admin/roles') }}">
                                    <i class="bi bi-key"></i>
                                    <span>Roles & Permissions</span>
                                </a>
                            </li>
                            @endcan
                            @can('view users')
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('admin/users*') ? 'active' : '' }}" href="{{ url('/admin/users') }}">
                                    <i class="bi bi-person"></i>
                                    <span>Users</span>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </div>
                </li>
                @endif
            </ul>
        </aside>

        <!-- Main Content -->
        <div class="content-wrapper">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <button class="btn d-lg-none" type="button" onclick="document.getElementById('sidebar').classList.toggle('active')">
                        <i class="bi bi-menu-button-wide"></i>
                    </button>
                    
                    <div class="ms-auto d-flex align-items-center">
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
                                <div class="avatar avatar-online me-2">
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=696cff&color=fff" alt="User Avatar" class="rounded-circle" width="38">
                                </div>
                                <span class="fw-semibold">{{ auth()->user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i> Profile</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button class="dropdown-item text-danger" type="submit">
                                            <i class="bi bi-box-arrow-right me-2"></i> Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Content -->
            <main class="content">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
