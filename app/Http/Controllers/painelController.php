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
                                    |dimensions:max_width=1500,max_height=1200
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

    public function painelAdminMostrar()
    {
        $videoTable = videos::orderBy('id_video')->get();
        return view('painel_admin_mostrar', compact('videoTable'));
    }


    public function painelAdminEditar(Request $request, $id)
    {
        if ( session('login') && session('isAdmin') == '1'){
            // $categories = categories::orderBy('id_categoria')->get();
            // $videoTable = videos::orderBy('id_video')->get()->first();
            $categories = categories::get();
            $id = videos::find($id);
            return view('painel_admin_editar', compact('categories'), compact('id'));
        }else{
            return redirect()->route('index');
        }
    }

    public function painelAdminEfetuarEditar(Request $request, $id)
    {

        $categories = categories::get();
        $video = videos::find($id);
        // dd($id);

        //VALIDAÇÃO
        $this->validate($request, [
            'painel_text_titulo' => '',
            'painel_text_descricao' => '',
            'painel_categoria' => '',

            //TODO: BUGADO
            // 'painel_text_imagem' => '
            //                         dimensions:min_width=100,min_height=200
            //                         |dimensions:max_width=1500,max_height=1200
            //                         |mimes:jpeg,png,jpg',

            'painel_text_video' => ''
        ]);

        //SALVAR NO BANCO
        $params = request()->except('_token');
        $video->titulo = $params['painel_text_titulo'];
        $video->descricao = $params['painel_text_descricao'];
        $video->imagem_capa = $video->imagem_capa;
        $video->categoria_id = $params['painel_categoria'];
        $video->video = $params['painel_text_video'];
        // dd($video->imagem_capa);

        //IMAGEM
        if($request->hasFile('painel_text_imagem')) {
            if($video->imagem_capa != ''){
                unlink(public_path('/images/uploads/'.$video->imagem));
                $video->imagem = '';
            }

            $uploadFile = $request->file('painel_text_imagem');
            $fileName = uniqid().'.'.$uploadFile->extension();
            $uploadFile->storeAs('/', $fileName, 'uploads');
            $video->imagem_capa = $fileName;
        }

        $video->update();

        //TODO: ID VOLTA VAZIO, BUGADO

        $mensagem_sucesso = ['Video editado com sucesso!'];

        return view('painel_admin_editar', compact('mensagem_sucesso'), compact('categories'), ['id' => $id]);

    }

    public function painelAdminDeletar($id)
    {
        $video = videos::find($id);
        $video->delete();
        return redirect()->route('usuario_painel_admin_mostrar');
    }


}
