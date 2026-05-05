@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center py-5">
        <div class="col-md-5">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <h3 class="fw-bold">Welcome Back</h3>
                        <p class="text-muted">Please sign in to your account</p>
                    </div>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div class="d-flex justify-content-between">
                                <label for="password" class="form-label">Password</label>
                                @if (Route::has('password.request'))
                                    <a class="small text-decoration-none" href="{{ route('password.request') }}">
                                        Forgot Password?
                                    </a>
                                @endif
                            </div>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>

                        <div class="mb-0">
                            <button type="submit" class="btn btn-primary w-100 py-3 rounded-pill fw-bold">
                                Sign In
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="text-center mt-4">
                <p class="text-muted">Don't have an account? <a href="{{ route('register') }}" class="text-decoration-none">Create one</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
