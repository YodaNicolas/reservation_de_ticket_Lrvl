<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CentralController extends Controller
{
    public function connection()
    {
        return view('vueclient/connection');
    }







    public function form_register(Request $request)
    {
        if ($request->session()->get('user')) {

            return redirect('/espace-membre')->with('status', 'veuillez vous deconnecter avant de vous reinscrire');
        }
        return view('register');
    }
    public function form_login(Request $request)
    {
        if ($request->session()->get('user')) {

            return redirect('/espace-membre')->with('status', 'veuillez vous deconnecter avant de vous reconnecter');
        }
        return view('login');
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
        if ($request->input('password1') != $request->input('password2')) {
            return 'mot de passe pas conforme';
            // return redirect('/clientregister')->with('status', 'Mot de passe non conforme.');
        }
        
        $client->password =  bcrypt($request->input('password1'));
        $client->save();
       
        return ('enregistré avec succes.');
    }
    public function traitement_login(Request $request)
    {
        $request->validate([
            'email' => 'email|required',
            'password' => 'required|min:8',
        ]);
        $client = User::where('email', $request->input('email'))->first();
        if ($client) {
            if (Hash::check($request->input('password'), $client->password)) {
                $request->session()->put('client', $client);
                return redirect('/espace-membre');
            } else {
                return back()->with('status', 'Mot de passe incorrect');
            }
        } else {
            return back()->with('status', 'Désolé vous n\'avez pas de compte avec cet email.');
        }
    }
    public function logout(Request $request)
    {
        $request->session()->forget('client');
        return redirect('/login')->with('status', 'vous venez de vous deconnecter');
    }
    public function traitement_index(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'date_de_naissance' => 'required|string|max:255',
            'profile_image' => 'required|string',
        ]);
    }

    public function ajoutenbase(Request $request)
    {
        $util = new utilisateur();
        $util->name = $request->input('name');
        $util->prenom = $request->input('prenom');
        $util->date_de_naissance = $request->input('date_de_naissance');
        if ($request->hasFile('profile_image')) {

            $file = $request->file('profile_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/utilisateur/', $filename);
            $util->profile_image = $filename;
        }
        $util->save();
        return redirect('espace-membre')->with('status' . 'utilisateur ajouté avec succès.');
    }

    public function rendrevue()
    {
        $utilisateur = utilisateur::all();
        return view('espacemembre', compact('utilisateur'));
    }

    public function delete($id)
    {
        $utilisat = utilisateur::find($id);
        $utilisat->delete();
        // $nom_complet = $user->name." ".$user->prenom;
        // utili::find($user)->delete();
        // return back()->with("successDelete", "L'utilisateur nom_complet supprimé avec succès");
        return redirect('espace-membre');
    }

    public function edit($id)
    {
        $utilisateur = utilisateur::find($id);
        return view('form2', compact('utilisateur'));
    }

    public function modifier(Request $request, $utilisateur)
    {
        $utilisat = utilisateur::find($utilisateur);
        $utilisat->name = $request->input('name');
        $utilisat->prenom = $request->input('prenom');
        $utilisat->date_de_naissance = $request->input('date_de_naissance');

        if ($request->hasFile('profile_image')) {

            $file = $request->file('profile_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/utilisateur/', $filename);
            $utilisat->profile_image = $filename;
        }

        $utilisat->update();
        // return redirect('/');
        return redirect('espace-membre');
    }
}
