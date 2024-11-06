<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class singlePagecontroller extends Controller
{
    public function singlePage(){
        return view('super-admin-singlePage');
    }
}
