<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PeMagangController;
use App\Http\Controllers\BimbinganController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\PeSkripsiController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\JadwalmagangController;
use App\Http\Controllers\Admin\PermissionController;




Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome', function () {
    return view('welcome');
})->middleware(['auth', 'verified'])->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/forms', function () {
        return view('admin.forms');
    })->name('admin.forms');

    Route::get('/tables', function () {
        // Ambil semua data users dari database
        $users = User::all();

        // Kirim data users ke view 'admin.tables'
        return view('admin.tables', compact('users'));
    })->name('admin.tables');
    Route::get('/ui-elements', function () {
        return view('admin.ui-elements');
    })->name('admin.ui-elements');
});

Route::group(['middleware' => ['permission:publish articles']], function () {});

// Group routes that need admin role and authentication
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
});


//route jadwalskripsi
Route::resource('jadwals', JadwalController::class)->middleware(['role:admin|dosen']);
//route jadwal magang
Route::resource('jadwalmagangs', JadwalmagangController::class)->middleware(['role:admin|dosen']);
//route menampilkan jadwal di welcom
Route::get('/', [JadwalMagangController::class, 'welcome'])->name('welcome');
Route::get('/welcome', [JadwalMagangController::class, 'welcome'])->name('welcome');

//route Pe_magang
Route::resource('pe-magangs', PeMagangController::class)->middleware(['role:admin|mahasiswa|dosen']);
// Route::get('pe-magangs', PeMagangController::class, 'create')->middleware(['permission:pengajuan magang']);

Route::resource('pe-skripsis', PeSkripsiController::class);

Route::apiResource('mahasiswa', MahasiswaController::class);

Route::resource('dosens', DosenController::class);

Route::resource('bimbingan', BimbinganController::class);

Route::resource('pengajuans', PengajuanController::class);

require __DIR__ . '/auth.php';
