<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CentralController;

use App\Http\Controllers\inscriptionController;
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
    return view('accueil');
});

// ROUTES POUR LES ACTIONS DES ADMIN
Route::middleware('[auth]', 'role:admin')->group(function () {



});


Route::get('inscription', [ClientController::class, 'inscription'] )->name('inscription');

Route::post('envoiEnBase', [CentralController::class, 'traitement_register'])->name('envoiEnBase');

Route::get('connection', [CentralController::class, 'connection'])->name('connection');


Route::get("/accueil",[inscriptionController::class, 'accueil'])->name("accueil");

Route::get("/liste_managers",[inscriptionController::class, 'liste_managers'])->name("liste_managers");

Route::get("/liste_inscriptions",[inscriptionController::class, 'liste_inscriptions'])->name("liste_inscriptions");


