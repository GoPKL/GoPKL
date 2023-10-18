<?php

use App\Http\Controllers\GuruController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
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
    return view('pages.backend.siswa.dashboard-siswa');
})->middleware(['auth', 'verified']);

Route::get('/select-role', function () {
    return view('auth.select-role');
});

// Route::get('/test', function () {
//     return view('layouts.backend.main');
// });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';



// siswa
Route::resource('siswa', SiswaController::class);

Route::get('/dashboard/siswa', function () {
    return view('pages.backend.siswa.dashboard-siswa');
})->middleware(['auth', 'verified'])->name('dashboard-siswa');

Route::get('/persyaratan-pkl', function () {
    return view('pages.backend.siswa.persyaratan-pkl');
})->middleware(['auth', 'verified'])->name('persyaratan-pkl');



//guru
Route::resource('guru', GuruController::class);



//perusahaan
Route::resource('perusahaan', PerusahaanController::class);
