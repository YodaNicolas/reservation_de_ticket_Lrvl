<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
   public function inscription(){

  return view('vueadmin.formenregisrtrement');
     
   }
public function store (Request $request){
    $request->validate([
      'nom'=>['required','string','max:255'],
      'prenom'=>['require','string','max:255'],
      'email'=>['require','string','max:255'],
      'password'=>['require','string','max:255'],

    ]);
}
}