<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::name("content.")
    ->controller(ContentController::class)
    ->middleware(['noAuth'])
    ->group(function(){
        Route::get('/','index')->name('index');
        Route::get('/pengumuman', 'contentPengumuman')->name('pengumuman');
        Route::get('/berita', 'contentBerita')->name('berita');
    });

Route::prefix("admin")
    ->name("admin.")
    ->middleware(['withAuth'])
    ->controller(ContentController::class)
    ->group(function () {
        Route::get('/', 'dashboard')->name('dashboard');
        Route::get('/pengumuman', 'pagePengumuman')->name('pengumuman');
        // Route::get('/pengumuman/{id}', 'pagePengumumanid')->name('detail_pengumuman');
        Route::get('/berita', 'pageBerita')->name('berita');

        Route::post('/store', 'pageStore')->name('store');
        Route::post("/update/{id}", "pageUpdate")->name("update");
        Route::get("/destroy/{id}", "pageDestroy")->name("destroy");
    });

Route::post('/update/{id}', [UserController::class, 'update'])->name('userupdate')->middleware(['withAuth']);

Route::any('/login', [AuthController::class, 'login'])->name('login')->middleware(['noAuth']);
Route::any('/logout', [AuthController::class, 'logout'])->name('logout')->middleware(['withAuth']);