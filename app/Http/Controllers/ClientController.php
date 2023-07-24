<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
   public function ClientRegister(){

        return view('vueclient.enregisrtrement');
   }


}
