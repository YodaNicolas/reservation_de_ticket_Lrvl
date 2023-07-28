<?php

namespace App\Http\Controllers;

// use App\Models\User::role();
use App\Models\role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CentralController extends Controller
{
    // public function connection()
    // {
    //     return view('vueclient/connection');
    // }

    public function form_login(Request $request)
    {
        if ($request->session()->get('user')) {
            return view('deconncet');
            // return redirect('/espace-membre')->with('status', 'veuillez vous deconnecter avant de vous reconnecter');
        }
        return view('vueclient/connection');
    }


    public function traitement_login(Request $request)
    {
        $request->validate([
            'email' => 'string|required',
            'password' => 'required|min:8',
        ]);

        $client1 = User::where('email', $request->input('email'))->first();
        $client2 = User::where('numero', $request->input('email'))->first();

        if ($client1) {
            $client = $client1;
            $pers = 1;
        } else {
            $client = $client2;
        }

        if ($client) {
            if (Hash::check($request->input('password'), $client->password)) {
                if ($client->etat == 1) {
                    $request->session()->put('user', $client);
                   if($pers == 1){

                        $attentes =  DB::select('select * from users where etat = 0');
                       return view('vueadmin.liste_inscriptions', compact('attentes'));
                       
                    }
                    return view('espaceconect');

                } else {
                    return ("votre inscription n'a pas encore été validé");
                }
            } else {
                return ('Mot de passe incorrect');
                // return back()->with('status', 'Mot de passe incorrect');
            }
        } else {
            return ('Pas de compte');
            // return back()->with('status', 'Désolé vous n\'avez pas de compte avec cet email.');
        }
    }


    public function logout(Request $request)
    {
        $request->session()->forget('user');
        return ('deconection reussi');
        // return redirect('/login')->with('status', 'vous venez de vous deconnecter');
    }



    public function form_register(Request $request)
    {
        if ($request->session()->get('user')) {

            return redirect('/espace-membre')->with('status', 'veuillez vous deconnecter avant de vous reinscrire');
        }
        return view('register');
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
        $util = new User();
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
        $utilisateur = User::all();
        return view('espacemembre', compact('utilisateur'));
    }

    public function delete($id)
    {
        $utilisat = User::find($id);
        $utilisat->delete();
        // $nom_complet = $user->name." ".$user->prenom;
        // utili::find($user)->delete();
        // return back()->with("successDelete", "L'utilisateur nom_complet supprimé avec succès");
        return redirect('espace-membre');
    }

    public function edit($id)
    {
        $utilisateur = User::find($id);
        return view('form2', compact('utilisateur'));
    }

    public function modifier(Request $request, $utilisateur)
    {
        $utilisat = User::find($utilisateur);
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
