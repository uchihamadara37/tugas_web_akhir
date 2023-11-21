<?php
use App\Http\Controllers\UsersController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MemberController;
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

Route::get('/main', [UsersController::class, "index"]);
Route::get('/', [LoginController::class, "index"]);
Route::get('/register', [LoginController::class, "register"]);
Route::get('/profile/{id}/{token}', [MemberController::class, "profile"]);
Route::get('/penjualan/{id}/{token}', [MemberController::class, "penjualan"]);
Route::get('/pembelian/{id}/{token}', [MemberController::class, "pembelian"]);

Route::post('/login', [LoginController::class, "loginStart"]);
Route::post('/regist', [LoginController::class, 'registration']);
