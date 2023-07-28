<?php

use App\Http\Controllers\AdminController;
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
    return view('welcome');
})->name("accueil");

Route::get('connection', [CentralController::class, 'form_login'])->name('connection');
Route::post('connectionTraitement', [CentralController::class, 'traitement_login'])->name('connectionTraitement');



// ROUTES POUR LES ACTIONS DES ADMIN
Route::middleware('[auth]', 'role:admin')->group(function () {


});

// ROUTES ADMINS
Route::get('formadmin', [AdminController::class, 'AdminRegister'] );
Route::post('envoiEnBaseAdmin', [AdminController::class, 'traitement_register'])->name('envoiEnBaseAdmin');


// ROUTES CLIENTS
Route::get('formclient', [ClientController::class, 'ClientRegister'])->name('inscriptionClient');
Route::post('envoiEnBaseClient', [ClientController::class, 'traitement_register'])->name('envoiEnBaseClient');


Route::post('deconnection', [CentralController::class, 'logout'])->name('deconection');


route::get("/inscritListe",[inscriptionController::class, 'inscriptionListe'])->name("inscriptionListe");


Route::get('delete/{utili}', [inscriptionController::class, 'delete'])->name('utili.delete');


route::get("/validation/{utili}", [inscriptionController::class, 'validation']);

route::get("/managerlist",[AdminController::class, 'rendrelistemanager'])->name("managerlist");

route::get("AjoutManag",[inscriptionController::class, 'AjoutManager'])->name("AjoutManager");