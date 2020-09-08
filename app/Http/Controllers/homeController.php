<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    //=============================================================
    // Index
    public function home()
    {
        return view('home');
    }

}
