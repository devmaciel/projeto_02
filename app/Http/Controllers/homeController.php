<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
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

        if($usuario === null){
            $erros_bd = ['Essa conta de usuário não existe.'];
            return view('pagina_inicial', compact('erros_bd'));
        }

        // if($usuario->count() == 0){
        //     $erros_bd = ['Essa conta de usuário não existe.'];
        //     return view('pagina_inicial', compact('erros_bd'));
        // }

        //não é recomendado, porque diz que usuário existe
        //verifica se a senha bate com a do banco de dados
        if(!Hash::check($request->text_senha, $usuario->senha)){
            $erros_bd = ['A senha está incorreta.'];
            return view('pagina_inicial', compact('erros_bd'));
        }

        // if($usuario->senha !== $request->text_senha){
        //     $erros_bd = ['A senha está incorreta.'];
        //     return view('pagina_inicial', compact('erros_bd'));
        // }

        //session
        // Session::put('chave', 'validado');
        // Session::put('usuario',$usuario->usuario);
        Session::put('login', 'sim');
        Session::put('id_usuario', $usuario->id_usuario);
        Session::put('usuario', $usuario->usuario);
        Session::put('nome', $usuario->nome);
        Session::put('imagem', $usuario->imagem);
        Session::put('email', $usuario->email);

        if(isset($_POST['lembrar'])){
            setcookie('lembrar', true, time()+(60*60*24), '/');
            setcookie('usuario', $usuario->usuario, time()+(60*60*24), '/');
            setcookie('senha', $usuario->senha, time()+(60*60*24), '/');
        }

        return redirect('/');
    }



    //===============================================
    // CRIAÇÃO DE NOVA CONTA
    public function formCriarNovaConta()
    {
        //apresentar o formulário de criação de nova conta
        return view('criar_nova_conta');
    }


    public function executarCriacaoDeNovaConta(Request $request)
    {
        //executar os procedimentos e verificações para criação de uma nova conta


        //==================================================
        // VALIDAÇÃO
        //==================================================
        $this->validate($request, [
            'text_usuario' => 'required|between:3,30|alpha_num',
            'text_senha' => 'required|between:6,50',
            'text_senha_repetida' => 'required|same:text_senha',
            'text_email' => 'required|email',
            'check_termos_condicoes' => 'accepted'
        ]);
        // return 'OK';


        //==================================================
        // VERIFICAÇÃO
        //==================================================
        $dados = usuarios::where('usuario', '=', $request->text_usuario)
                ->orWhere('email', '=', $request->text_email)
                ->get();

        /* buscar a partir de array/objeto
        -----------------
        ->get()->frist()
            if(count($dados))
        *buscar a partir de collection
        ---------------------------
        ->get()
            if($dados->count())
        */

        if($dados->count() > 0){
            $erros_bd = ['Já existe um usuário com o mesmo nome ou com o mesmo email.'];
            return view('criar_nova_conta', compact('erros_bd'));
        }

        //==================================================
        //inserir novo usuário na base de dados
        $novo = new usuarios;
        $novo->usuario = $request->text_usuario;
        $novo->senha = Hash::make($request->text_senha);
        $novo->email = $request->text_email;
        $novo->nome = $request->text_nome;
        $novo->imagem = '';
        $novo->save();

        $mensagem_sucesso = ['Conta criada com sucesso!'];

        return view('criar_nova_conta', compact('mensagem_sucesso'));
        // return redirect('/');

    }

    //============================================================
    // Usuário - Editar Perfil
    public function editarPerfil()
    {
        return view('editar_perfil');
    }

    public function efetuarEditarPerfil(Request $request)
    {

        //Nome
        $usuario = session('id_usuario');
        $usuariodb = usuarios::find($usuario);
        $usuariodb->nome = $request->text_nome;
        // dd($usuariodb->nome);

        //Imagem
        $this->validate($request, [
            'text_imagem' => 'dimensions:min_width=100,min_height=200
                                |dimensions:max_width=1200,max_height=1200
                                |mimes:jpeg,png,jpg'
        ]);


        //Deletar a última
        if($usuariodb->imagem != ''){
            unlink(public_path('/images/uploads/'.$usuariodb->imagem));
            $usuariodb->imagem = '';
        }

        $uploadFile = $request->file('text_imagem');
        $fileName = uniqid().'.'.$uploadFile->extension();
        $uploadFile->storeAs('/', $fileName, 'uploads');
        $usuariodb->imagem = $fileName;

        $usuariodb->save();

        Session::put('imagem', $usuariodb->imagem);
        Session::put('nome', $usuariodb->nome);

        $mensagem_sucesso = ['Editado com Sucesso!'];
        return view('editar_perfil', compact('mensagem_sucesso'));

    }


    //============================================================
    // LOGOUT
    public function logout()
    {
        //destruir sessão e redirect
        Session::flush();
        setcookie('lembrar', 'true', time()-1, '/');
        return redirect('/');
    }

}
