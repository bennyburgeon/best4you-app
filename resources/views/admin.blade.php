<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Login | {{ config('app.name') }}</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Public Sans', sans-serif;
            background-color: #f5f5f9;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card {
            border: none;
            box-shadow: 0 0.25rem 1rem rgba(161, 172, 184, 0.45);
            border-radius: 0.5rem;
            width: 100%;
            max-width: 400px;
        }
        .app-brand {
            display: flex;
            justify-content: center;
            margin-bottom: 2rem;
            font-size: 1.5rem;
            font-weight: 700;
            color: #566a7f;
            text-transform: uppercase;
        }
        .btn-primary {
            background-color: #696cff;
            border-color: #696cff;
        }
        .btn-primary:hover {
            background-color: #5f61e6;
            border-color: #5f61e6;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="card-body p-4 p-sm-5">
            <div class="app-brand">
                Best4You
            </div>
            <h4 class="mb-2">Welcome to Admin! 👋</h4>
            <p class="mb-4 text-muted">Please sign-in to your account</p>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('login.post') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your email" required autofocus>
                </div>
                <div class="mb-3 form-password-toggle">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" required>
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
