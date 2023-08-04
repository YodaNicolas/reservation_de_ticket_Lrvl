<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\reservation;
use App\Models\role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
   public function ClientRegister(Request $request){
      if ($request->session()->get('user')) {
         return ('deconecté vous avant');
      }
      return view('vueclient.formenregClient');
   }

   // public function acceuilCli(){
   //    $cnt = $request->session()->get('user');
   //    return view('vueclient.formenregClient');
   // }


   public function traitement_register(Request $request)
   {
      $request->validate([
         'nom' => 'required',
         'prenom' => 'required',
         'numero' => 'required|unique:users',
         'password1' => 'required|min:8',
         'password2' => 'required|min:8',
      ]);

      $client = new User();
      $client->nom = $request->input('nom');
      $client->prenom = $request->input('prenom');
      $client->numero = $request->input('numero');
      if ($request->input('password1') != $request->input('password2')) {
         return back()->with('non_ok', 'Mot de passe non conforme.');
         // return redirect('/clientregister')->with('status', 'Mot de passe non conforme.');
      }

      $client->password =  bcrypt($request->input('password1'));

      $enregistre = $client->save();
      $role = role::select('id')->where('nom', 'client')->first();
      $client->roles()->attach($role);
      $client->role = 'client';
      $client->update();
      if ($enregistre) {
         return redirect('/')->with('statut', 'enregistré avec succes attendez la validation de votre inscription avant de vous connecter.');
      } else {
         return back()->with('non_ok', "Une erreure s'est produite et l'enregistrement à échoué.");
      }
   }


   public function reserve($id){
      $reserv = new reservation;
      $reserv->user_id = $id;
      $reserv->save();
      return " RESERVATION EFFECTUE AVEC SUCCES A BIENTOT.";
      // view('espaceconect')->with('statut', "Reservation d'une place effectuée avec succès on a hate de vous acceuillir!");
      // return view('vueclient.mesreserv', compact('reservs'));
   }
public function resVar(){
      return redirect()->back()->with('statut', "Reservation d'une place effectuée avec succès on a hate de vous acceuillir!");
}

   public function vuereservations($id)
   {
      $reservs =  DB::select("select * from reservations where utilisateur_id = '$id'");
      return view('vueclient.mesreserv', compact('reservs'));
   }
}
