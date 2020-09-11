@extends('layouts.app')

{{-- FORMULÁRIO DE LOGIN --}}

@section('conteudo')

    <link href="{{ asset('css/deslogado.css') }}" rel="stylesheet" />

    <div style="background-image: url('{{ asset('images/bgjaoflix.png') }}');" class="container_login">

        <header>
            <a href="" ><img class="img-logo" src="{{ asset('images/jaoflix.jpg') }}" alt="logotipo"></a>
        </header>

        <div class="box">
            <h2>Criar Conta</h2>


        {{-- VALIDAÇÃO DE ERROS --}}
        @include('templates/erros')
        @include('templates/sucesso')

        <form method="POST" action="{{ route('usuario_executar_criar_nova_conta') }}" autocomplete="off">
            @csrf

            <div class="inputBox">
                <input type="text" name="text_usuario" id="id_text_usuario" required>
                <label for="text_usuario">Usuário</label>
            </div>

            <div class="inputBox">
                <input type="text" name="text_email" id="id_text_email" required>
                <label for="text_usuario">Email</label>
            </div>

            <div class="inputBox">
                <input type="password" name="text_senha" id="id_text_senha" required>
                <label for="text_senha">Senha</label>
            </div>

            <div class="inputBox">
                <input type="password" name="text_senha_repetida" id="id_text_senha_repetida" required>
                <label for="text_senha_repetida">Repita a Senha</label>
            </div>

            {{-- aceitação das condições de serviços; recaptch etc --}}
            <div class="form-group text-center condicoes">
                <input type="checkbox" id="id_check_termos_condicoes" name="check_termos_condicoes" value="1">
                <label for="id_check_termos_condicoes"> Concordo com os termos e condições de uso.</label>
            </div>


            <input type="submit" value="Criar">


            {{-- voltar ao inicio --}}
            <div class="text-center margin-top-20 breadCriar">
                <a href="{{ asset('/') }}">Voltar</a>
            </div>


        </form>

        </div>
    </div>


@endsection
