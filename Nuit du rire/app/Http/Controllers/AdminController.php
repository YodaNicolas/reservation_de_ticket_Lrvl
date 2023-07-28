<?php

namespace App\Http\Controllers;

use App\Models\role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function AdminRegister( Request $request)
    {
        if ($request->session()->get('user')) {

            return ('deconecté vous avant');
            // return redirect('/espaceconect')->with('status', 'veuillez vous deconnecter avant de vous reinscrire');
        }

        return view('vueadmin.formenregAdmin');
    }


    public function traitement_register(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'email|required|unique:users',
            'password1' => 'required|min:8',
            'password2' => 'required|min:8',
        ]);

        $client = new User();
        $client->nom = $request->input('nom');
        $client->prenom = $request->input('prenom');
        $client->email = $request->input('email');
        $client->etat = 1;
        if ($request->input('password1') != $request->input('password2')) {
            return 'mot de passe pas conforme';
            // return redirect('/clientregister')->with('status', 'Mot de passe non conforme.');
        }

        $client->password =  bcrypt($request->input('password1'));
        $client->save();

        $role = role::select('id')->where('nom', 'admin')->first();
        $client->roles()->attach($role);
        $client->role = 'admin';
        $client->update();
        return ('enregistré avec succes.');
    }


    public function rendrelistemanager()
    {
        $attentes =  DB::select('select * from users where etat = 0');
        return view('vueadmin.liste_manager', compact('attentes'));
    }



}



