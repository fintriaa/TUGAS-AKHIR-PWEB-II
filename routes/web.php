<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\UangKeluar;
use App\Http\Livewire\UangMasuk;

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

Route::group([ "middleware" => ['auth:sanctum', 'verified'] ], function() {
    Route::view('/dashboard', "dashboard")->name('dashboard');
    Route::get('/uang-keluar', UangKeluar::class)->name('uangkeluar');
    Route::get('/uang-masuk', UangMasuk::class)->name('uangmasuk');

    Route::get('/user', [ UserController::class, "index_view" ])->name('user');
    Route::view('/user/new', "pages.user.user-new")->name('user.new');
    Route::view('/user/edit/{userId}', "pages.user.user-edit")->name('user.edit');
});
