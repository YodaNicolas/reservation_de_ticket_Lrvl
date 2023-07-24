<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CentralController;


use App\Http\Controllers\ClientController;
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

// ROUTES POUR LES ACTIONS DES ADMIN
Route::middleware('[auth]', 'role:admin')->group(function () {



});


Route::get('clientregister', [ClientController::class, 'ClientRegister'] );

Route::get('connection', [CentralController::class, 'connection'])->name('connection');
