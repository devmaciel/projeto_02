@extends('layouts.app')

{{-- FORMULÁRIO DE LOGIN --}}

@section('conteudo')

    <link href="{{ asset('css/deslogado.css') }}" rel="stylesheet" />

    <div style="background-image: url('{{ asset('images/bgjaoflix.png') }}');" class="container_login">

        <header>
            <a href="" ><img class="img-logo" src="{{ asset('images/jaoflix.jpg') }}" alt="logotipo"></a>
        </header>

        <div class="box">
            <h2>Login</h2>


        <form action="" autocomplete="off">

            <div class="inputBox">
                <input type="text" name="text_usuario" required>
                <label for="text_usuario">Usuário</label>
            </div>

            <div class="inputBox">
                <input type="password" name="text_senha" required>
                <label for="text_senha">Senha</label>
            </div>

            <input type="submit" name="" value="Entrar">

        </form>

        <div class="lembrar-me">
            <input type="checkbox" name="lembrar" />
            <label>Lembre-se de mim</label>
        </div>
        <div class="clearfix"></div>

        </div>
    </div>


@endsection
