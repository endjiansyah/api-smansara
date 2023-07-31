<?php

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
    ->name("content.")
    ->controller(ContentController::class)
    ->group(function () {
        Route::get('/pengumuman', 'pagePengumuman')->name('pengumuman');
        Route::post('/store', 'pageStore')->name('store');
        Route::post("/update/{id}", "pageUpdate")->name("update");
        Route::get("/destroy/{id}", "pageDestroy")->name("destroy");
    });