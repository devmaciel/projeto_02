<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usuarios;
use Session;

class painelController extends Controller
{
    //============================================================
    // Usuário - Painel Admin
    public function painelAdmin()
    {
        if ( session('login') && session('isAdmin') == '1'){
            return view('painel_admin');
        }else{
            return redirect()->route('index');
        }
    }


    public function painelAdminAdicionar()
    {
        if ( session('login') && session('isAdmin') == '1'){
            return view('painel_admin_adicionar');
        }else{
            return redirect()->route('index');
        }
    }


    public function painelAdminEditar()
    {
        if ( session('login') && session('isAdmin') == '1'){
            return view('painel_admin_editar');
        }else{
            return redirect()->route('index');
        }
    }


}
