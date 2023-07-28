<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
   public function ClientRegister(Request $request)
   {

      if ($request->session()->get('user')) {

         return ('deconecté vous avant');

         // return redirect('/espaceconect')->with('status', 'veuillez vous deconnecter avant de vous reinscrire');
      }

      return view('vueclient.formenregClient');
   }


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
         return 'mot de passe pas conforme';
         // return redirect('/clientregister')->with('status', 'Mot de passe non conforme.');
      }

      $client->password =  bcrypt($request->input('password1'));
      
      $client->save();

      $role = role::select('id')->where('nom', 'client')->first();
      $client->roles()->attach($role);
      // $client->role = role::select('nom')->where('id', $role)->first();

      $client->role = 'client';
      $client->update();
      return ('enregistré avec succes.');
   }
}
