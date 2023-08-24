<?php

use App\Http\Controllers\ContentController;
use App\Http\Controllers\AuthController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get("/content/pengumuman", [ContentController::class, "pengumuman"])->middleware("apikey");
Route::get("/content/berita", [ContentController::class, "berita"])->middleware("apikey");
Route::get("/content/detail/{id}", [ContentController::class, "show"])->middleware("apikey");
Route::post("/content", [ContentController::class, "store"])->middleware("apikey");
Route::post("/content/update/{id}", [ContentController::class, "update"])->middleware("apikey");
Route::post("/content/delete/{id}", [ContentController::class, "destroy"])->middleware("apikey");

// ---------{Sanctum}-------
Route::post("/user/update/{id}", [AuthController::class, "update"])->middleware("apikey");
Route::post("/user/register", [AuthController::class, "store"])->middleware("apikey");
Route::post("/login", [AuthController::class, "login"])->middleware("apikey");
Route::get("/logout", [AuthController::class, "logout"])->middleware(["auth:sanctum","apikey"]);
Route::get("/me", [AuthController::class, "getUser"])->middleware(["auth:sanctum","apikey"]);