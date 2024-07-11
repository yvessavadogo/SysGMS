<?php

use App\Http\Controllers\AssureController;
use App\Http\Controllers\MutualisteController;
use App\Http\Controllers\PersonneAChargeController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');

Route::get('/assures', [AssureController::class, 'index'])->name('assures.index');

Route::resource('mutualistes', MutualisteController::class);

Route::resource('personnes_a_charge', PersonneAChargeController::class)->except(['index','create']);
Route::get('personnes_a_charge/{idMutualiste}/{idAssure}/index', [PersonneAChargeController::class, 'index'])->name('personnes_a_charge.index');
Route::get('personnes_a_charge/{idMutualiste}/{idAssure}/create', [PersonneAChargeController::class, 'create'])->name('personnes_a_charge.create');
