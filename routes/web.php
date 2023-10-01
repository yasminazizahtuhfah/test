<?php

use App\Http\Controllers\identitasController;
use App\Http\Controllers\landingpageController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\portofolioController;
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

Route::resource('identitas', IdentitasController::class);
Route::resource('portofolio', portofolioController::class);

Route::get('login', [loginController::class, 'index']);
Route::post('login', [loginController::class, 'processLogin']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/landing-page', [landingpageController::class, 'index']);
