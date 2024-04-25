<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    //
    public function displaySongs(){
        return view('displaySongs');
    }
}
