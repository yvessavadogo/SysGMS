<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssureApiController;
use App\Http\Controllers\MutualisteApiController;
use App\Http\Controllers\PersonneAChargeApiController;
use App\Http\Controllers\UserApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function () {

});

// Authentication routes
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('sanctum/token', 'App\Http\Controllers\API\AuthController@login');

// Routes pour AssureApiController
Route::get('/assures', [AssureApiController::class, 'index']);
Route::get('/assures/{id}', [AssureApiController::class, 'show']);

// Routes pour MutualisteApiController
Route::get('/mutualistes', [MutualisteApiController::class, 'index']);
Route::post('/mutualistes', [MutualisteApiController::class, 'store']);
Route::get('/mutualistes/{id}', [MutualisteApiController::class, 'show']);
Route::put('/mutualistes/{id}', [MutualisteApiController::class, 'update']);
Route::delete('/mutualistes/{id}', [MutualisteApiController::class, 'destroy']);

// Routes pour PersonneAChargeApiController
Route::get('/personnesacharge/{idMutualiste}', [PersonneAChargeApiController::class, 'index']);
Route::post('/personnesacharge', [PersonneAChargeApiController::class, 'store']);
Route::get('/{id}/personnesacharge', [PersonneAChargeApiController::class, 'show']);
Route::put('/personnesacharge/{id}', [PersonneAChargeApiController::class, 'update']);
Route::delete('/personnesacharge/{id}', [PersonneAChargeApiController::class, 'destroy']);

// Routes pour UserApiController
Route::get('/users', [UserApiController::class, 'index'])->name('users.index');
