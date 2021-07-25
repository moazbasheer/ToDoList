<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
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

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::post('/', [HomeController::class, 'postIndex'])->name('mark');

Route::group(['middleware' => 'notAuth'], function() {
    Route::get('/login', [AuthController::class, 'getLogin'])->name('login');
    Route::post('/postLogin', [AuthController::class, 'postLogin'])->name('postlogin');
    Route::get('/register', [HomeController::class, 'getRegister'])->name('register');
    Route::post('/register', [HomeController::class, 'postRegister'])->name('postregister');
});


Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/add', [HomeController::class, 'getAdd'])->name('add');
Route::post('/add', [HomeController::class, 'postAdd']);

Route::get('/delete/{id}', [HomeController::class, 'getDelete'])->name('delete');