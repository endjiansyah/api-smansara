<?php

use App\Http\Controllers\ContentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/content/pengumuman", [ContentController::class, "pengumuman"]);
Route::get("/content/berita", [ContentController::class, "berita"]);
Route::get("/content/detail/{id}", [ContentController::class, "show"]);
Route::post("/content", [ContentController::class, "store"]);
Route::post("/content/update/{id}", [ContentController::class, "update"]);
Route::post("/content/delete/{id}", [ContentController::class, "destroy"]);