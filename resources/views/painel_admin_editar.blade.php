@extends('layouts.painel')
<body class="body-editar">

@section('conteudoPainel')

    <link href="{{ asset('css/deslogado.css') }}" rel="stylesheet" />

    <div style="top: 400px" class="box">
    <h1>Editar Video</h1>

    {{-- VALIDAÇÃO DE ERROS --}}
    <br>
    @include('templates/erros')
    @include('templates/sucesso')

    <form method="POST" action="{{ route('usuario_painel_admin_efetuar_editar', $id ?? '') }}" autocomplete="off">
        @csrf

        <div class="inputBox">
            <input type="text" name="painel_text_titulo" id="id_painel_text_titulo" value="{{ $id->titulo ?? '' }}" >
            <label for="painel_text_titulo">Título</label>
        </div>

        <div class="boxTextArea">
            <label for="painel_text_descricao">Descrição</label>
            <textarea name="painel_text_descricao" id="id_painel_text_descricao" >{{ $id->descricao ?? '' }}</textarea>
        </div>

        <div class="inputBox">
            <label style="position: relative;top:-30px;" for="painel_categoria_id">Categorias</label>
            <select style="position: relative;left:-88px;top:4px;" name="painel_categoria">
                @foreach ($categories as $categorie)
                    <option @php
                        if($categorie->id_categoria == @$id->categoria_id ?? '') echo 'selected'
                        @endphp
                        value="{{ $categorie->id_categoria }}">
                        {{ $categorie->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="inputBoxImagem">
            <label for="painel_text_imagem">Imagem Capa</label>
            <input type="file" name="painel_text_imagem" id="id_painel_text_imagem" value="{{ $id->imagem_capa ?? '' }}">
        </div>

        <div class="inputBox">
            <input type="text" name="painel_text_video" id="id_painel_text_video" value="{{ $id->video ?? '' }}" >
            <label for="painel_text_video">Video URL</label>
        </div>

        <input type="submit" value="Editar">


        {{-- voltar ao inicio --}}
        <div class="text-center margin-top-20 breadCriar">
            <a href="{{ asset('/painel_admin_mostrar') }}">Voltar</a>
        </div>


    </form>
    </div>

@endsection

