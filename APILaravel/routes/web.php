<?php

use App\Http\Controllers\APIRoleController;
use App\Http\Controllers\AppController;
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

Route::prefix("/app")->group(function() {
    Route::prefix("/admin")->group(function() {
        Route::get("/role", [APIRoleController::class, "index"]);
    });
});
