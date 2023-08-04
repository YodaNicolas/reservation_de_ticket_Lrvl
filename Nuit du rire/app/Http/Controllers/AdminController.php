<?php

namespace App\Http\Controllers;

use App\Models\role;
use App\Models\User;
use App\Models\reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function AdminRegister(Request $request)
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

        $util = new User();
        $util->nom = $request->input('nom');
        $util->prenom = $request->input('prenom');
        $util->email = $request->input('email');
        $util->etat = 1;
        if ($request->input('password1') != $request->input('password2')) {
            return back()->with('non_ok', 'Mot de passe non conforme.');
            // return redirect('/clientregister')->with('status', 'Mot de passe non conforme.');
        }
        $util->password =  bcrypt($request->input('password1'));
        $enregistre = $util->save();

        $role = role::select('id')->where('nom', 'admin')->first();
        $util->roles()->attach($role);
        $util->role = 'admin';
        $util->update();
        if ($enregistre) {
            return redirect('/')->with('statut', 'enregistré avec succes.');
        } else {
            return back()->with('non_ok', "Une erreure s'est produite et l'enregistrement à échoué.");
        }
    }

    public function rendrelistemanager()
    {
        $manags = User::where('role','manager')->get();
        return view('vueadmin.liste_manager', compact('manags'));
    }

    public function rendrelistereservation()
    {
        $reservs = reservation::all();
        return view('vueadmin.liste_reservation', compact('reservs'));
    }


    public function AjoutManager()
    {
        return view('vueadmin/AjoutManager');
    }




    public function AjoutTraitement(Request $request)
    {
        $util = new user();
        $util->nom = $request->input('name');
        $util->prenom = $request->input('prenom');
        $util->email = $request->input('email');
        $util->etat = 1;
        $util->password = bcrypt('12345678');

        $enregistre = $util->save();
        $role = role::select('id')->where('nom', 'manager')->first();
        $util->roles()->attach($role);
        $util->role = 'manager';
        $util->update();
        if ($enregistre) {
            return redirect('managerlist')->with('status', 'Nouveau manager ajouté son mot de passe par defaut est: 12345678');
            // return back()->with('ok', 'enregistré avec succes.');
        } else {
            return back()->with('non_ok', "Une erreur s'est produite et l'enregistrement à échoué.");
        }
    }


    public function delete($id)
    {
        $utilisat = user::find($id);
        $utilisat->delete();
        return back();
    }

    public function edit($id)
    {
        $utilisat = user::find($id);
        return view('vueadmin.formedit', compact('utilisat'));
    }

    public function validreserve($id)
    {
        $reserv = reservation::find($id);
        if ($reserv->etat_reservation == 'Non validé') {
            $reserv->etat_reservation = 'Validée';
            $reserv->update();
            return redirect('reservationlist');
        } else {
            $reserv->etat_reservation = 'Non validé';
            $reserv->update();
            return redirect('reservationlist')->with('statut', 'reservation remis à NON VALIDE.');
        }
    }


    public function deletereserv($id)
    {
        $reserv= reservation::find($id);
        $reserv->delete();
        return back()->with('statut', 'Reservation supprimée avec succès.');
    }


    public function modifier(Request $request, $utili)
    {
        $utilisat = user::find($utili);
        $utilisat->nom = $request->input('nom');
        $utilisat->prenom = $request->input('prenom');
        $utilisat->email = $request->input('email');
        $utilisat->update();
        return redirect('managerlist');
    }
}
