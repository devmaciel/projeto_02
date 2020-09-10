<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\usuarios; //usuarios model
use Session;

class homeController extends Controller
{
    //=============================================================
    // Index
    public function index()
    {
        //Sessão Inativa/Ativa
        if(!Session::has('login'))
            return $this->pgLogin();
        else
            return view('home');
    }

    //===============================================
    // LOGIN
    public function pgLogin()
    {
        return view('pagina_inicial');
    }

    public function executarLogin(Request $request)
    {
        //==================================================
        // VALIDAÇÃO
        $this->validate($request, [
            'text_usuario' => 'required',
            'text_senha' => 'required',
        ]);
        // return 'OK';


        //==================================================
        // VERIFICAÇÃO
        $usuario = usuarios::where('usuario', $request->text_usuario)->first();
        // dd($usuario);

        if($usuario->count() == 0){
            $erros_bd = ['Essa conta de usuário não existe.'];
            return view('pagina_inicial', compact('erros_bd'));
        }

        //não é recomendado, porque diz que usuário existe
        //verifica se a senha bate com a do banco de dados
        if(!Hash::check($request->text_senha, $usuario->senha)){
            $erros_bd = ['A senha está incorreta.'];
            return view('pagina_inicial', compact('erros_bd'));
        }

        //session
        // Session::put('chave', 'validado');
        // Session::put('usuario',$usuario->usuario);
        Session::put('login', 'sim');
        Session::put('usuario', $usuario->usuario);

        return redirect('/');
    }

    //============================================================
    // LOGOUT
    public function logout()
    {
        //destruir sessão e redirect
        Session::flush();
        return redirect('/');
    }

}
