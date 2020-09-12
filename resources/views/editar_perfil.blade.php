@php
    use App\Models\usuarios; //usuarios model
@endphp

@extends('layouts.app')

@section('conteudo')

    <header>
        <a href="{{ asset('/') }}" ><img class="img-logo" src="{{ asset('images/jaoflix.jpg') }}" alt="logotipo"></a>
    </header>

    <div class="box">
        <h2>Editar Perfil</h2>


    {{-- VALIDAÇÃO DE ERROS --}}
    @include('templates/erros')
    @include('templates/sucesso')

    <form method="POST" action="{{ route('usuario_efetuar_editar_perfil') }}" enctype="multipart/form-data" autocomplete="off">
        @csrf

        <div class="box-usuario">


            <div class="avatar-usuario">
                <i class="fas fa-user"></i>
            </div>

            <input type="file" name="text_imagem" id="id_text_imagem" required>

            <div class="inputBoxImage">

            </div>


            {{-- <div class="imagem-usuario">
                <img src="" alt="imagem do usuário">
            </div>

            <div class="inputBoxImage">
                <input type="file" name="text_imagem" id="id_text_imagem" required>
            </div> --}}


        </div>


        <div class="inputBox">
            <input type="text" name="text_nome" id="id_text_nome" required>
            <label for="text_nome">Nome</label>
        </div>


        <input type="submit" value="Atualizar">


        {{-- voltar ao inicio --}}
        <div class="text-center margin-top-20 breadCriar">
            <a href="{{ asset('/') }}">Voltar</a>
        </div>


    </form>

    </div>
</div>


@endsection


