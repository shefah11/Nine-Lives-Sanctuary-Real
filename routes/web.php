<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HealthController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\CatController;
use App\Http\Controllers\AdoptionController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// ===== PUBLIC ROUTES (ANYONE CAN VIEW) =====
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/cats', [CatController::class, 'index'])->name('cats.index');
Route::get('/cats/{id}', [CatController::class, 'show'])->name('cats.show');
Route::get('/report/create', [ReportController::class, 'create'])->name('reports.create');
Route::post('/report', [ReportController::class, 'store'])->name('reports.store');
Route::get('/health', [HealthController::class, 'index'])->name('health.index');
Route::get('/health/{id}', [HealthController::class, 'show'])->name('health.show');

// ===== GUEST ROUTES (LOGIN/REGISTER PAGES) =====
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

// ===== PROTECTED ROUTES (REQUIRE LOGIN) =====
Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/profile', [UserProfileController::class, 'show'])->name('profile.show');
    Route::put('/profile', [UserProfileController::class, 'update'])->name('profile.update');
    
    // Adoption application (requires login)
    Route::get('/adoptions/apply/{cat_id}', [AdoptionController::class, 'showApplyForm'])->name('adoptions.apply');
    Route::post('/adoptions', [AdoptionController::class, 'store'])->name('adoptions.store');
});

// ===== ADMIN ROUTES (REQUIRE ADMIN LOGIN) =====
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    
    Route::get('/health', [HealthController::class, 'manage'])->name('health.manage');
    Route::get('/health/create', [HealthController::class, 'create'])->name('health.create');
    Route::post('/health', [HealthController::class, 'store'])->name('health.store');
    Route::get('/health/{id}/edit', [HealthController::class, 'edit'])->name('health.edit');
    Route::put('/health/{id}', [HealthController::class, 'update'])->name('health.update');
    Route::delete('/health/{id}', [HealthController::class, 'destroy'])->name('health.destroy');
});