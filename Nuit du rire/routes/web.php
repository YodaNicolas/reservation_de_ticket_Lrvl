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

Route::get('/welcome', function () {
    return view('welcome');
})->name("accueil");

Route::get('/', [CentralController::class, 'form_login'])->name('connection');
Route::post('connectionTraitement', [CentralController::class, 'traitement_login'])->name('connectionTraitement');



// ROUTES POUR LES ACTIONS DES ADMIN
Route::middleware('[auth]', 'role:admin')->group(function () {



});
route::get("/inscritListe", [inscriptionController::class, 'inscriptionListe'])->name("inscriptionListe");

Route::get('delete/{utili}', [inscriptionController::class, 'delete'])->name('utili.delete');
route::get("/validation/{utili}", [inscriptionController::class, 'validation']);

route::get("AjoutManag", [AdminController::class, 'AjoutManager'])->name("AjoutManager");
route::post("AjoutManag", [AdminController::class, 'AjoutTraitement'])->name("ajout");
Route::get('deletemana/{utili}', [AdminController::class, 'delete']);
Route::put('insertdonne/{utili}', [AdminController::class, 'modifier']);    


// ROUTES ADMINS
route::get("/managerlist", [AdminController::class, 'rendrelistemanager'])->name("managerlist");

route::get("/reservationlist", [AdminController::class, 'rendrelistereservation'])->name("reservlist");
Route::get('formadmin', [AdminController::class, 'AdminRegister']);
Route::post('envoiEnBaseAdmin', [AdminController::class, 'traitement_register'])->name('envoiEnBaseAdmin');


Route::get('acceuilClient', [ClientController::class, 'acceuilCli']);
Route::get('mesreserve', [ClientController::class, 'resVar']);

Route::get('edit/{utili}', [AdminController::class, 'edit']);

Route::get('valid/{utili}', [AdminController::class, 'validreserve']);
Route::get('delete/{utili}', [AdminController::class, 'deletereserv']);

Route::get('reserve/{utili}', [ClientController::class, 'reserve']);

Route::get('mesreserve/{utili}', [ClientController::class, 'vuereservations']);

// ROUTES CLIENTS
Route::get('formclient', [ClientController::class, 'ClientRegister'])->name('inscriptionClient');
Route::post('envoiEnBaseClient', [ClientController::class, 'traitement_register'])->name('envoiEnBaseClient');
Route::post('deconnection', [CentralController::class, 'logout'])->name('deconection');
