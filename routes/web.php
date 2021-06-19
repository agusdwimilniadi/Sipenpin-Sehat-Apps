<?php

use App\Http\Controllers\AkunController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\BeratController;
use App\Http\Controllers\CallDaruratController;
use App\Http\Controllers\DetailBeritaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PerpustakaanController;
use App\Http\Controllers\StatistikController;
use App\Http\Controllers\PendataanController;
use App\Http\Controllers\KonsultasiController;

use App\Http\Controllers\BackLogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminBeritaController;
use App\Http\Controllers\AdminPerpustakaanController;
use App\Http\Controllers\AdminMasterController;
use App\Http\Controllers\AdminUserDetailController;
use App\Http\Controllers\AdminStatistikController;
use App\Http\Controllers\AdminUserController;

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

Route::get('/', [HomeController::class, 'logins']);
Route::get('/back-log', [BackLogController::class, 'index']);
Route::post('/back-log/admin', [BackLogController::class, 'login']);
Route::get('/back-dashboard', [DashboardController::class, 'index'])->middleware(['auth']);


Route::get('/berita', [BeritaController::class, 'index']);
Route::get('/detailberita/{id}', [DetailBeritaController::class, 'index']);
Route::get('/beratbadan', [BeratController::class, 'index']);
Route::get('/buku', [BukuController::class, 'index']);
Route::get('/akun', [AkunController::class, 'index']);
Route::get('/statistika', [StatistikController::class, 'index']);
Route::get('/pendataan', [PendataanController::class, 'index']);
Route::post('/pendataan/save', [PendataanController::class, 'save']);
Route::get('/perpustakaan', [PerpustakaanController::class, 'index']);
Route::get('/calldarurat', [CallDaruratController::class, 'index']);
Route::get('/calldarurat-1', [CallDaruratController::class, 'bidan']);
Route::get('/calldarurat-2', [CallDaruratController::class, 'perawat']);
Route::get('/calldarurat-3', [CallDaruratController::class, 'kader']);
Route::get('/calldarurat-4', [CallDaruratController::class, 'pemudadesa']);
Route::get('/konsultasi', [KonsultasiController::class, 'index']);


Auth::routes();

// Route::group(['middleware' => ['role:Superadmin']], function () {
    Route::get('/back-berita', [AdminBeritaController::class, 'index']);
    Route::post('/back-berita/save', [AdminBeritaController::class, 'save']);
    Route::post('/back-berita/{berita}/edit', [AdminBeritaController::class, 'edit']);
    Route::patch('/back-berita/{berita}/update', [AdminBeritaController::class, 'update']);
    Route::delete('/back-berita/{berita}/drop', [AdminBeritaController::class, 'drop']);

    Route::get('/back-perpustakaan', [AdminPerpustakaanController::class, 'index']);
    Route::post('/back-perpustakaan/save', [AdminPerpustakaanController::class, 'save']);
    Route::post('/back-perpustakaan/{perpustakaan}/edit', [AdminPerpustakaanController::class, 'edit']);
    Route::patch('/back-perpustakaan/{perpustakaan}/update', [AdminPerpustakaanController::class, 'update']);
    Route::delete('/back-perpustakaan/{perpustakaan}/drop', [AdminPerpustakaanController::class, 'drop']);

    Route::get('/back-master/pekerjaan', [AdminMasterController::class, 'indexPekerjaan']);
    Route::post('/back-master/pekerjaan/save', [AdminMasterController::class, 'savePekerjaan']);
    Route::delete('/back-master/pekerjaan/{master}/drop', [AdminMasterController::class, 'dropPekerjaan']);
    Route::get('/back-master/status-hubungan', [AdminMasterController::class, 'indexStatusHubungan']);
    Route::post('/back-master/status-hubungan/save', [AdminMasterController::class, 'saveStatusHubungan']);
    Route::delete('/back-master/status-hubungan/{master}/drop', [AdminMasterController::class, 'dropStatusHubungan']);

    Route::get('/back-master/dusun', [AdminMasterController::class, 'indexDusun']);
    Route::post('/back-master/dusun/save', [AdminMasterController::class, 'saveDusun']);
    Route::delete('/back-master/dusun/{master}/drop', [AdminMasterController::class, 'dropDusun']);

    Route::get('/back-master/bidan', [AdminMasterController::class, 'indexBidan']);
    Route::post('/back-master/bidan/save', [AdminMasterController::class, 'saveBidan']);
    Route::delete('/back-master/bidan/{master}/drop', [AdminMasterController::class, 'dropBidan']);
    Route::patch('/back-master/bidan/{master}/bidanActive', [AdminMasterController::class, 'bidanActive']);

    Route::get('/back-master/perawat', [AdminMasterController::class, 'indexPerawat']);
    Route::post('/back-master/perawat/save', [AdminMasterController::class, 'savePerawat']);
    Route::delete('/back-master/perawat/{master}/drop', [AdminMasterController::class, 'dropPerawat']);
    Route::patch('/back-master/perawat/{master}/perawatActive', [AdminMasterController::class, 'perawatActive']);

    Route::get('/back-master/kader', [AdminMasterController::class, 'indexKader']);
    Route::post('/back-master/kader/save', [AdminMasterController::class, 'saveKader']);
    Route::delete('/back-master/kader/{master}/drop', [AdminMasterController::class, 'dropKader']);
    Route::patch('/back-master/kader/{master}/kaderActive', [AdminMasterController::class, 'kaderActive']);

    Route::get('/back-master/nomor_kader', [AdminMasterController::class, 'indexNomorKader']);
    Route::post('/back-master/nomor_kader/save', [AdminMasterController::class, 'saveNomorKader']);
    Route::delete('/back-master/nomor_kader/{master}/drop', [AdminMasterController::class, 'dropNomorKader']);
    Route::patch('/back-master/nomor_kader/{master}/noKaderActive', [AdminMasterController::class, 'noKaderActive']);

    Route::get('/back-master/nomor_kades', [AdminMasterController::class, 'indexNomorKades']);
    Route::post('/back-master/nomor_kades/save', [AdminMasterController::class, 'saveNomorKades']);
    Route::delete('/back-master/nomor_kades/{master}/drop', [AdminMasterController::class, 'dropNomorKades']);
    Route::patch('/back-master/nomor_kades/{master}/noKadesActive', [AdminMasterController::class, 'noKadesActive']);

    Route::get('/back-user-detail', [AdminUserDetailController::class, 'index']);
    Route::get('/back-user-detail/add', [AdminUserDetailController::class, 'add']);
    Route::post('/back-user-detail/save', [AdminUserDetailController::class, 'save']);
    Route::post('/back-user-detail/{UserDetail}/see', [AdminUserDetailController::class, 'see']);

    Route::get('back-statistik', [AdminStatistikController::class, 'index']);

    Route::get('/back-user', [AdminUserController::class, 'index']);
    Route::post('/back-user/save', [AdminUserController::class, 'save']);
    Route::patch('/back-user/{user}/reset', [AdminUserController::class, 'reset']);
    Route::delete('/back-user/{user}/drop', [AdminUserController::class, 'drop']);
// });

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
