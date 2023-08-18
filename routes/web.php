<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CapaianSasaranStrategisController;
use App\Http\Controllers\DaftarKomponenController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\MultiKomponenController;
use App\Http\Controllers\PendingMattersCapaianController;
use App\Http\Controllers\PendingMattersController;
use App\Http\Controllers\SatuKomponenController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// FRONTENDS
Route::get('/', [FrontendController::class, 'daftar_pm_fe'])->name('daftar-pm-fe');
Route::get('/daftar-komponen/{id}', [FrontendController::class, 'show'])->name('daftar-komponen-fe');
Route::get('/pengembang', [FrontendController::class, 'pengembang'])->name('tim-pengembang');


// NEW FE PM
// Route::get('/daftar-pending-matters', [FrontendController::class, 'daftar_pm_fe'])->name('daftar-pm-fe');
Route::get('/capaian-pending-matters', [FrontendController::class, 'capaian_pm_fe'])->name('capaian-pm-fe');



// BACKEND

// Route::group(
//     ['prefix' => '_superadmin_', 'middleware' => ['auth']],
//     function () {
//     }
// );

Route::group(['prefix' => '_superadmin_', 'middleware' => ['auth']], function () {

    Route::resource('home-admin', AdminController::class)->middleware('auth');
    // Route::resource('capaian-sasaran-strategis', CapaianSasaranStrategisController::class)->middleware('auth');
    Route::resource('satu_komponen', SatuKomponenController::class)->middleware('auth');
    Route::resource('multi_komponen', MultiKomponenController::class)->middleware('auth');
    Route::get('/create-satu-komponen-admin-pm', [AdminController::class, 'satu_komponen_iku_admin'])->middleware('auth')->name('satu_komponen_iku_admin');
    // Route::get('/create-multi-komponen-admin-iku', [AdminController::class, 'multi_komponen_iku_admin'])->middleware('auth')->name('multi_komponen_iku_admin');
    Route::get('/create-multi-komponen-admin-detail/{id}', [AdminController::class, 'multi_komponen_detail_admin'])->middleware('auth')->name('multi_komponen_detail_admin');
    Route::post('/create-multi-komponen-admin-detail', [AdminController::class, 'store_komponen_detail'])->middleware('auth')->name('multi_komponen_detail_admin_add');
    Route::resource('daftar-komponen', DaftarKomponenController::class)->middleware('auth');
    Route::resource('pending-matters-home', PendingMattersController::class)->middleware('auth');
    Route::resource('pending-matters-capaian', PendingMattersCapaianController::class)->middleware('auth');
    Route::get('/create-satu-komponen-admin-pm', [PendingMattersController::class, 'satu_komponen_pm_admin'])->middleware('auth')->name('satu_komponen_pm_admin');
    Route::get('/create-multi-komponen-admin-pm', [PendingMattersController::class, 'multi_komponen_pm_admin'])->middleware('auth')->name('multi_komponen_pm_admin');

    Route::get('/create-multi-komponen-admin-pm-detail/{id}', [PendingMattersController::class, 'multi_komponen_detail_admin'])->middleware('auth')->name('multi_komponen_detail_admin_pm');
    Route::post('/create-multi-komponen-admin-pm-detail', [PendingMattersController::class, 'store_komponen_detail'])->middleware('auth')->name('multi_komponen_detail_admin_pm_add');
});



// Auth::routes();
Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);
