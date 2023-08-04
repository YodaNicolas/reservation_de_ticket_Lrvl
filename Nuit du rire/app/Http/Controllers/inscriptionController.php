<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class inscriptionController extends Controller
{
    public function inscriptionListe(){
        $attentes =  DB::select('select * from users where etat = 0');
        return view('vueadmin.liste_inscriptions', compact('attentes'));

    }

    public function validation($id)
    {
        $utilisat = user::find($id);
        $utilisat->etat=1;
        $utilisat->update();
        return redirect('/inscritListe');
    }


    public function delete($id)
    {
        $utilisat = user::find($id);
        $utilisat->delete();
      
        return redirect('/inscritListe');
    }


}


?>
