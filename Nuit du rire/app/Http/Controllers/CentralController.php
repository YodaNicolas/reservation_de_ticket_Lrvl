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
        // if ($request->session()->get('user')) {
        //     return view('deconncet');
        // }
        $client1 = User::where('email', $request->input('email'))->first();
        $client2 = User::where('numero', $request->input('email'))->first();

        if ($client1) {
            $client = $client1;
        } else {
            $client = $client2;
        }

        if ($client) {
            if (Hash::check($request->input('password'), $client->password)) {
                if ($client->etat == 1) {
                    $request->session()->put('user', $client);
                    $cnt = $request->session()->get('user');

                    if ($client->role == 'admin') {
                        $manags =  DB::select("select * from users where role = 'manager'");
                        return view('vueadmin.liste_manager', compact('manags'))->with('statut','admin');

                    } else {
                        if ($client->role == 'manager') {
                            $attentes = DB::select('select * from users where etat = 0');
                            return view('vueadmin.liste_inscriptions', compact('attentes', 'cnt'));
                        } else {
                            return view('espaceconect', compact('cnt'));
                        }
                    }
                } else {
                    return back()->with('statut', "votre inscription n'a pas encore été validé");
                }
            } else {
                return back()->with('statut', "Mot de passe incorrect");
                // return back()->with('status', 'Mot de passe incorrect');
            }
        } else {
            return back()->with('statut', "pas de compte pour ses info!");
            // return back()->with('status', 'Désolé vous n\'avez pas de compte avec cet email.');
        }
    }


    public function logout(Request $request)
    {
        $request->session()->forget('user');
        return redirect('/');
        // return redirect('/login')->with('status', 'vous venez de vous deconnecter');
    }
}
