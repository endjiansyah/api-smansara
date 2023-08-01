<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContentController;
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

Route::prefix("admin")
    ->name("admin.")
    ->controller(ContentController::class)
    ->group(function () {
        Route::get('/pengumuman', 'pagePengumuman')->name('pengumuman');
        Route::get('/berita', 'pageBerita')->name('berita');

        Route::post('/store', 'pageStore')->name('store');
        Route::post("/update/{id}", "pageUpdate")->name("update");
        Route::get("/destroy/{id}", "pageDestroy")->name("destroy");
    });

Route::any('/login', [AuthController::class, 'login'])->name('login')->middleware(['noAuth']);
Route::any('/logout', [AuthController::class, 'logout'])->name('logout')->middleware(['withAuth']);