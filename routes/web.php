<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminArsipController;
use App\Http\Controllers\Admin\DivisiController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\ArsipController;
use App\Http\Controllers\User\SuratTemplateController;

// ================= ROOT =================
Route::get('/', function () {
    return view('welcome');
});

// ================= DASHBOARD =================
Route::get('/dashboard', function () {
    $user = auth()->user();

    if ($user->role->name === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('user.dashboard');
})->middleware('auth')->name('dashboard');

// ================= ADMIN =================
Route::middleware(['auth', 'is_admin'])
    ->prefix('admin')
    ->group(function () {

        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');

        Route::resource('divisi', DivisiController::class);
        Route::resource('users', UserController::class);

        Route::get('arsip', [AdminArsipController::class, 'index'])->name('admin.arsip.index');
        Route::get('arsip/{arsip}', [AdminArsipController::class, 'show'])->name('admin.arsip.show');
        Route::get('arsip/{arsip}/download', [AdminArsipController::class, 'download'])->name('admin.arsip.download');
        Route::delete('arsip/{arsip}', [AdminArsipController::class, 'destroy'])->name('admin.arsip.destroy');
    });

// ================= USER =================
Route::middleware(['auth', 'is_user'])
    ->group(function () {

        Route::get('/user/dashboard', function () {
            return view('user.dashboard');
        })->name('user.dashboard');

        Route::resource('arsip', ArsipController::class);
        Route::get('arsip/{arsip}/download', [ArsipController::class, 'download'])->name('arsip.download');

        Route::get('/surat-templates', [SuratTemplateController::class, 'index'])->name('surat-templates.index');
        Route::get('/surat-templates/{template}/view', [SuratTemplateController::class, 'view'])->name('surat-templates.view');
        Route::get('/surat-templates/{template}/download', [SuratTemplateController::class, 'download'])->name('surat-templates.download');
    });

// ================= DEBUG =================
Route::get('/debug-upload', function () {
    return response()->json([
        'upload_max_filesize' => ini_get('upload_max_filesize'),
        'post_max_size'       => ini_get('post_max_size'),
    ]);
});

// ================= AUTH (BREEZE) =================
require __DIR__.'/auth.php';
