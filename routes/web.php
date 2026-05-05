<?php

use Illuminate\Support\Facades\Route;
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
Route::get('/about', function () { return view('about'); });
Route::get('/services', function () { return view('services'); });
Route::get('/contact', function () { return view('contact'); });
Route::get('/upload-resume', function () { return view('upload-resume'); });

Auth::routes();

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
