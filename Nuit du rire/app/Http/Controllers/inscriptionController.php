<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class inscriptionController extends Controller
{
    public function liste_inscriptions(){
        return view('liste_inscriptions');
        
    }


    public function liste_managers (){
   
        return view('liste_des_managers');
    }
    public function accueil(){
   
        return view('accueil');
    }
}


?>
