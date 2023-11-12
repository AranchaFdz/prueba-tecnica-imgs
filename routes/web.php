<?php

use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('/auth/login');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    Route::get('/dashboard', [ImageController::class, 'index'])->name('dashboard');
    Route::get('/create', [ImageController::class, 'create'])->name('create');
    Route::post('/create-image', [ImageController::class, 'store'])->name('create-image');
    Route::get('/edit/{id}', [ImageController::class, 'show'])->name('edit');
    Route::put('/edit/edit-image', [ImageController::class, 'update'])->name('edit-image');
    Route::delete('/delete-image/{id}', [ImageController::class, 'destroy'])->name('delete-image');
});
