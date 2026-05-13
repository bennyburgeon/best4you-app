<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | {{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Public Sans', sans-serif; background: #f5f5f9; min-height: 100vh; }
        .auth-wrapper { min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 1.5rem; }
        .auth-card { width: 100%; max-width: 460px; border: 0; border-radius: .75rem; box-shadow: 0 0.25rem 1rem rgba(161,172,184,.45); }
        .auth-card .card-body { padding: 2rem; }
        .form-control { min-height: 44px; border-radius: .5rem; }
        .btn-login { background: #696cff; border-color: #696cff; min-height: 44px; border-radius: .5rem; font-weight: 600; }
        .btn-login:hover { background: #5f61e6; border-color: #5f61e6; }
    </style>
</head>
<body>
    <div class="auth-wrapper">
        <div class="card auth-card">
            <div class="card-body">
                <h4 class="fw-semibold mb-1">Welcome to B4U</h4>
                <p class="text-muted mb-4">Please sign in to your account and start managing jobs</p>
                <form method="POST" action="{{ route('admin.login.submit') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">Remember me</label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-login w-100">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
