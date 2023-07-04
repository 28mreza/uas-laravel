<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PosyanduController;
use App\Http\Controllers\BalitaController;
use App\Http\Controllers\KaderController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\GiziController;
use App\Http\Controllers\GrafikController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SensorController;
use App\Http\Controllers\SummernoteController;

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

Route::get('/simpan/{nilaitinggi}/{nilaiberat}', [SensorController::class, 'simpansensor']);

// registrasi
Auth::routes(['verify' => true]);
Route::get('registrasi',[RegisterController::class,'register']);
Route::post('registrasi/submit',[RegisterController::class,'submit']);

Route::get('/login',[LoginController::class, 'index'])->name('login')->middleware('guest');
Route::get('/dashboard',[DashboardController::class, 'dashboard'])->name('dashboard')->middleware('verified');
Route::get('/',[DashboardController::class, 'dashboard'])->middleware('auth');

Auth::routes();

// superadmin
Route::middleware(['auth','auth.superadmin'])->group(function () {
    // admin
    Route::get('admin',[AdminController::class,'admin'])->name('admin');
    Route::get('admin/tambah',[AdminController::class,'tambah'])->name('admin.tambah');
    Route::post('admin/submit',[AdminController::class,'submit']);
    Route::get('admin/edit/{id}',[AdminController::class,'edit'])->name('admin.edit');
    Route::post('admin/update',[AdminController::class,'update']);
    Route::get('admin/delete/{id}',[AdminController::class,'delete']);
    Route::get('statusadmin-update/{id}',[AdminController::class,'status']);
    Route::get('resetpassword-admin/{id}',[AdminController::class,'reset']);
});

// admin
Route::middleware(['auth','auth.admin'])->group(function () {
    // kader
    Route::get('kader',[KaderController::class,'kader'])->name('kader');
    Route::get('kader/tambah',[KaderController::class,'tambah'])->name('kader.tambah');
    Route::post('kader/submit',[KaderController::class,'submit']);
    Route::get('kader/edit/{id}',[KaderController::class,'edit'])->name('kader.edit');
    Route::post('kader/update',[KaderController::class,'update']);
    Route::get('kader/delete/{email}',[KaderController::class,'delete']);
    Route::get('statuskader-update/{id}',[KaderController::class,'status']);
    Route::get('resetpassword-kader/{id}',[KaderController::class,'reset']);


    // posyandu
    Route::get('posyandu',[PosyanduController::class,'posyandu'])->name('posyandu');
    Route::get('posyandu/tambah',[PosyanduController::class,'tambah'])->name('posyandu.tambah');
    Route::post('posyandu/submit',[PosyanduController::class,'submit']);
    Route::get('posyandu/edit/{id}',[PosyanduController::class,'edit'])->name('posyandu.edit');
    Route::post('posyandu/update',[PosyanduController::class,'update']);
    Route::get('posyandu/delete/{id}',[PosyanduController::class,'delete']);
    Route::get('detailposyandu/{id}',[PosyanduController::class,'detail'])->name('posyandu.detail');
    Route::get('tambahdetailposyandu/{id}',[PosyanduController::class,'tambahdetail'])->name('tambahdetail.posyandu');
    Route::post('detailposyandu/submit',[PosyanduController::class,'submitdetail']);

    // hasil timbangan
    Route::get('hasiltimbangan',[GiziController::class,'hasil'])->name('hasiltimbangan');
    Route::get('hasiltimbangan/delete/{id}',[GiziController::class,'delete']);

    // grafik
    Route::get('grafik',[GrafikController::class,'grafik'])->name('grafik');
});

Route::middleware(['auth', 'auth.kader'])->group(function () {
    // balita
    Route::get('balita', [BalitaController::class, 'balita'])->name('balita');
    Route::get('balita/tambah', [BalitaController::class, 'tambah'])->name('balita.tambah');
    Route::post('balita/submit', [BalitaController::class, 'submit']);
    Route::get('balita/edit/{id}', [BalitaController::class, 'edit'])->name('balita.edit');
    Route::post('balita/update', [BalitaController::class, 'update']);
    Route::get('balita/delete/{id}', [BalitaController::class, 'delete']);
    // Route::get('tambahdetailbalita/{id}', [BalitaController::class, 'tambahdetail'])->name('tambahdetail.balita');
    Route::get('tambahdetailbalita/{id}', [GiziController::class, 'tambahdetail'])->name('tambahdetail.balita');
    // Route::post('detailbalita/submit/{id}', [BalitaController::class, 'submitdetail']);
    Route::post('detailbalita/submit/{id}', [GiziController::class, 'submitdetail']);
    Route::get('lihatdetail/{id}', [BalitaController::class, 'detail'])->name('lihatdetail.balita');
    Route::get('/tinggi', [SensorController::class, 'getTinggi']);
    Route::get('/berat', [SensorController::class, 'getBerat']);
    // Route::get('update-sensor', [SensorController::class, 'updateSensor']);
    
    // detail balita
    Route::get('detail/balita',[BalitaController::class,'detailbalita'])->name('detailbalita');
});

// profil
Route::get('profil',[ProfilController::class,'profil'])->name('profil');
Route::get('profil/edit',[ProfilController::class,'edit'])->name('profil.edit');
Route::post('profil/update',[ProfilController::class,'update'])->name('profil.update');

// summernote
Route::get('summernote',[SummernoteController::class,'summernote'])->name('summernote');
Route::get('summernote/tambah',[SummernoteController::class,'tambah'])->name('summernote.tambah');
Route::post('summernote/submit',[SummernoteController::class,'submit']);

Route::get('logout', function () {
    Auth::logout();
    return redirect('/');
});
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth.superadmin');
