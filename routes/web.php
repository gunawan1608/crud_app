<?php

use App\Http\Controllers\Admin\DivisiController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\ArsipController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = auth()->user();

    if ($user->role->name === 'admin') {
        return redirect('/admin/dashboard');
    }

    return redirect('/user/dashboard');
})->middleware(['auth'])->name('dashboard');

// Admin Routes
Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    });
});

Route::middleware(['auth', 'is_admin'])->prefix('admin')->group(function () {
    Route::resource('divisi', DivisiController::class);
    Route::resource('users', UserController::class);
});

// User Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard', function () {
        return view('user.dashboard');
    });

    // Arsip Routes untuk User
    Route::resource('arsip', ArsipController::class);
    Route::get('arsip/{arsip}/download', [ArsipController::class, 'download'])->name('arsip.download');
});

require __DIR__ . '/auth.php';
