<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class inscriptionController extends Controller
{
    public function index(){
        return view('liste_inscriptions');
        
    }


    public function vuelistmanage(){
   
        return view('liste_des_managers');
    }
}


?>
