<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndustryTypeController;
use App\Http\Controllers\JobCategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobTypeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

// Public routes
Route::get('/', function () {
    return view('frontend');
});

// Login route for middleware redirection
Route::get('/admin/login', function () {
    return view('admin');
})->name('login');

// Admin routes (Blade)
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('admin.dashboard');

    Route::resource('industry-types', IndustryTypeController::class);
    Route::resource('job-types', JobTypeController::class);
    Route::resource('job-categories', JobCategoryController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('jobs', JobController::class);
    Route::resource('job-applications', JobApplicationController::class);
    Route::resource('skills', SkillController::class);
    Route::resource('currencies', CurrencyController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('permissions', PermissionController::class);
});

// Catch-all for Frontend Vue SPA (if any remains)
Route::get('/{any?}', function () {
    return view('frontend');
})->where('any', '.*');
