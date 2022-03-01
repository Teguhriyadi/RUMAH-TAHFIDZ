<?php

use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\APIUserController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfilController;
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

// Route::get("/layouts", [AppController::class, "layouts"]);
// Route::get("/home", [AppController::class, "home"]);

// Buat percobaan, silahkan dihapus kalo nggk dipake
// Route::get("/login", [AppController::class, "home"]);

Route::get("/al-quran", function () {
    return view('quran');
});

Route::get("/al-quran/{id}", function ($id) {
    return view('surat', compact('id'));
});

Route::prefix("/app")->group(function () {

    Route::get("/login", [LoginController::class, "login"])->middleware('guest');
    Route::post("/login", [LoginController::class, "loginProses"]);

    Route::get("/forgot_password", [ForgotPasswordController::class, "index"]);

    Route::prefix("/admin")->group(function () {
        Route::group(["middleware" => ["otentikasi"]], function() {

            Route::group(["middleware" => ["can:admin"]], function() {
                Route::get("/status_absen", function() {
                    return view("/app/administrator/status_absen/index");
                });
                Route::get("/users", [APIUserController::class, "index"]);
                Route::get("/role", function() {
                    return view("/app/administrator/role/index");
                });
                Route::get("/informasi_login", [AppController::class, "informasi_login"]);
                Route::get("/siswa", function() {
                    return view("/app/administrator/siswa/index");
                });
                Route::get("/pengajar", function() {
                    return view("/app/administrator/pengajar/index");
                });
            });

            Route::group(["middleware" => ["can:pengajar"]], function() {
                Route::get("/penilaian", function() {
                    echo "Hay";
                });
                Route::get("/absensi", function() {
                    return view("/app/pengajar/absensi/index");
                });
            });

            Route::get("/profil", [ProfilController::class, "index"]);
            // Home
            Route::get("/home", [AppController::class, "home"]);

            // Users
        });
    });

    Route::group(["middleware" => ["otentikasi"]], function() {
        // Logout
        Route::get("/logout", [LoginController::class, "logout"]);
    });
});
