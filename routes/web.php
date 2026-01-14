<?php

use App\Http\Controllers\Admin\AdminArsipController;
use App\Http\Controllers\Admin\DivisiController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\ArsipController;
use App\Http\Controllers\User\SuratTemplateController;
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

    // Admin Arsip Routes
    Route::get('arsip', [AdminArsipController::class, 'index'])->name('admin.arsip.index');
    Route::get('arsip/{arsip}', [AdminArsipController::class, 'show'])->name('admin.arsip.show');
    Route::get('arsip/{arsip}/download', [AdminArsipController::class, 'download'])->name('admin.arsip.download');
    Route::delete('arsip/{arsip}', [AdminArsipController::class, 'destroy'])->name('admin.arsip.destroy');
});

// User Routes
Route::middleware(['auth', 'is_user'])->group(function () {
    Route::get('/user/dashboard', function () {
        return view('user.dashboard');
    });

    Route::resource('arsip', ArsipController::class);
    Route::get('arsip/{arsip}/download', [ArsipController::class, 'download'])
        ->name('arsip.download');

    Route::get('/surat-templates', [SuratTemplateController::class, 'index'])->name('surat-templates.index');
    Route::get('/surat-templates/{template}/view', [SuratTemplateController::class, 'view'])->name('surat-templates.view');
    Route::get('/surat-templates/{template}/download', [SuratTemplateController::class, 'download'])->name('surat-templates.download');
});

  // Arsip user (list & detail)
    Route::get('/arsip', [ArsipController::class, 'index'])->name('arsip.index');
    Route::get('/arsip/{arsip}', [ArsipController::class, 'show'])->name('arsip.show');

    // 🔥 VIEW PDF (STREAM, BUKAN DOWNLOAD)
    Route::get('/arsip/{arsip}/pdf',
        [ArsipController::class, 'viewPdf']
    )->name('arsip.pdf');

Route::get('/debug-upload', function () {
    return [
        'upload_max_filesize' => ini_get('upload_max_filesize'),
        'post_max_size'       => ini_get('post_max_size'),
    ];
});

require __DIR__ . '/auth.php';
