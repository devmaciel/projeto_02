<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\usuarios;
use App\Models\categories;
use App\Models\videos;
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
            $categories = categories::orderBy('id_categoria')->get();
            return view('painel_admin_adicionar', compact('categories'));
        }else{
            return redirect()->route('index');
        }
    }

    public function painelAdminEfetuarAdicionar(Request $request)
    {
        $categories = categories::orderBy('id_categoria')->get();
        //VALIDAÇÃO
        $this->validate($request, [
            'painel_text_titulo' => 'required',
            'painel_text_descricao' => 'required',
            'painel_categoria' => 'required',

            'painel_text_imagem' => 'required
                                    |dimensions:min_width=100,min_height=200
                                    |dimensions:max_width=1200,max_height=1200
                                    |mimes:jpeg,png,jpg',
            'painel_text_video' => 'required'

            // 'painel_text_video' => 'required
            //                         |mimes:mp4,ogx,oga,ogv,ogg,webm',

        ]);

        //RECUPERAR VALORES
        $titulo = $request->painel_text_titulo;
        $descricao = $request->painel_text_descricao;
        $categoria = $request->painel_categoria;

        //Imagem
        $imagem = $request->file('painel_text_imagem');
        $nomeImagem = uniqid().'.'.$imagem->extension();
        $imagem->storeAs('/', $nomeImagem, 'uploads');

        //Video
        //Warning: POST Content-Length of 45260828 bytes exceeds the limit of 41943040 bytes in Unknown on line 0
        // $video = $request->file('painel_text_video');
        // $nomeVideo = uniqid().'.'.$video->extension();
        // $video->storeAs('/', $nomeVideo, 'videoUploads');
        $video = $request->painel_text_video;

        //SALVAR NO BANCO
        $novo = new videos;
        $novo->titulo = $titulo;
        $novo->descricao = $descricao;
        $novo->imagem_capa = $nomeImagem;
        $novo->categoria_id = $categoria;
        $novo->video = $video;
        $novo->save();

        $mensagem_sucesso = ['Video adicionado com sucesso!'];

        return view('painel_admin_adicionar', compact('mensagem_sucesso'), compact('categories'));

    }


    public function painelAdminEditar()
    {
        if ( session('login') && session('isAdmin') == '1'){
            return view('painel_admin_editar');
        }else{
            return redirect()->route('index');
        }
    }

    public function painelAdminEfetuarEditar()
    {
        return 'OK';
    }


}
