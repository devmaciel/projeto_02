@extends('layouts.app')

{{-- FORMULÁRIO DE CRIAR CONTA --}}

@section('conteudo')

    <link href="{{ asset('css/deslogado.css') }}" rel="stylesheet" />

    <div style="background-image: url('{{ asset('images/bgjaoflix.png') }}');" class="container_login">

        <header>
            <a href="" ><img class="img-logo" src="{{ asset('images/jaoflix.jpg') }}" alt="logotipo"></a>
        </header>

        <div class="box">
            <h2>Login</h2>


        {{-- VALIDAÇÃO DE ERROS --}}
        @include('templates/erros')

        <form method="POST" action="{{ route('usuario_form_executar-login') }}" autocomplete="off">
            @csrf

            <div class="inputBox">
                <input type="text" name="text_usuario" id="id_text_usuario" required>
                <label for="text_usuario">Usuário</label>
            </div>

            <div class="inputBox">
                <input type="password" name="text_senha" id="id_text_senha"  required>
                <label for="text_senha">Senha</label>
            </div>

            <input type="submit" value="Entrar">

        </form>

        <div class="lembrar-me">
            <input type="checkbox" name="lembrar" />
            <label>Lembre-se de mim</label>
        </div>
        <div class="clearfix"></div>

        <div class="criar_nova_conta">
            <p>Novo por aqui? <a href="{{ asset('nova-conta') }}">Criar Conta</a></p>
        </div>

        </div>
    </div>


@endsection
