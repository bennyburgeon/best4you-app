<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\JobCategoryController;
use App\Http\Controllers\IndustryTypeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/jobs', [JobController::class, 'publicIndex'])->name('public.jobs');
Route::get('/jobs/{job}', [JobController::class, 'publicShow'])->name('public.jobs.show');
Route::post('/job-applications', [JobApplicationController::class, 'store'])->name('public.job-applications.store');
Route::get('/about', function () { return view('about'); });
Route::get('/services', function () { return view('services'); });
Route::get('/contact', function () { return view('contact'); });
Route::get('/upload-resume', function () { return view('upload-resume'); });

Route::redirect('/login', '/admin/login')->name('login');
Route::redirect('/register', '/admin/login')->name('register');

Route::prefix('admin')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', function () {
            return view('auth.login');
        })->name('admin.login');

        Route::post('/login', function (\Illuminate\Http\Request $request) {
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            if (Auth::attempt($credentials, $request->boolean('remember'))) {
                $request->session()->regenerate();
                return redirect()->intended(url('/admin'));
            }

            return back()->withErrors([
                'email' => 'Invalid credentials provided.',
            ])->onlyInput('email');
        })->name('admin.login.submit');
    });

    Route::post('/logout', function (\Illuminate\Http\Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login');
    })->name('logout');
});

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('currencies', CurrencyController::class);
    Route::resource('job-categories', JobCategoryController::class);
    Route::resource('industry-types', IndustryTypeController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('jobs', JobController::class);
    Route::resource('skills', SkillController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::get('job-applications', [JobApplicationController::class, 'index'])->name('job-applications.index');
});
