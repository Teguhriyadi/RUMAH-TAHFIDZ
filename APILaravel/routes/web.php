<?php

use App\Http\Controllers\APIRoleController;
use App\Http\Controllers\APIUserController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\LoginController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get("/layouts", [AppController::class, "layouts"]);
Route::get("/home", [AppController::class, "home"]);

// Buat percobaan, silahkan dihapus kalo nggk dipake
Route::get("/login", [AppController::class, "home"]);

Route::get("/al-quran", function () {
    return view('quran');
});

Route::get("/al-quran/{id}", function ($id) {
    return view('surat', compact('id'));
});

Route::prefix("/app")->group(function () {

    Route::get("/login", [LoginController::class, "login"])->middleware('guest');
    Route::post("/login", [LoginController::class, "login"]);

    Route::prefix("/admin")->group(function () {
        // Home
        Route::get("/home", [AppController::class, "home"])->middleware('otentikasi');
        // Users
        Route::get("/users", [APIUserController::class, "index"]);
        Route::get("/role", [APIRoleController::class, "index"]);
    });
});
