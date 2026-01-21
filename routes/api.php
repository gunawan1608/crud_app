<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| Ciri-ciri:
| - Stateless (tanpa session)
| - Pakai token Sanctum
| - Cocok buat Postman / Mobile / Frontend JS
*/

// ================= AUTH API =================

// LOGIN (POSTMAN)
Route::post('/login', function (Request $request) {

    $credentials = $request->validate([
        'email'    => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (!Auth::attempt($credentials)) {
        return response()->json([
            'message' => 'Email atau password salah'
        ], 401);
    }

    $user = Auth::user();

    // optional: bersihin token lama biar gak numpuk
    $user->tokens()->delete();

    $token = $user->createToken('postman-token')->plainTextToken;

    return response()->json([
        'user'  => $user,
        'token' => $token
    ]);
});

// LOGOUT API
Route::middleware('auth:sanctum')->post('/logout', function (Request $request) {
    $request->user()->currentAccessToken()->delete();

    return response()->json([
        'message' => 'Logout berhasil'
    ]);
});

// ================= GENERAL =================

// CEK USER LOGIN
Route::middleware('auth:sanctum')->get('/me', function (Request $request) {
    return response()->json($request->user());
});

// ================= ROLE BASED =================

// ADMIN ONLY
Route::middleware('auth:sanctum')->get('/admin/check', function (Request $request) {
    if ($request->user()->role->name !== 'admin') {
        return response()->json([
            'message' => 'Forbidden'
        ], 403);
    }

    return response()->json([
        'message' => 'Halo Admin',
        'user'    => $request->user()
    ]);
});

// USER ONLY
Route::middleware('auth:sanctum')->get('/user/check', function (Request $request) {
    if ($request->user()->role->name !== 'user') {
        return response()->json([
            'message' => 'Forbidden'
        ], 403);
    }

    return response()->json([
        'message' => 'Halo User',
        'user'    => $request->user()
    ]);
});
