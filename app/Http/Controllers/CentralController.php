<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CentralController extends Controller
{
    public function connection()
    {  
        return view('vueclient/connection');
    }
}
