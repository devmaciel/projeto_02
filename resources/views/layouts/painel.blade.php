@extends('layouts.app')

@section('conteudo')


    <div id="content">

        <span class="slidePainel">
            <a href="#" onclick="openSlideMenu()">
                <i class="fas fa-bars"></i>
            </a>
        </span>

        <div id="menu" class="navPainel">
            <a href="#" class="closePainel" onclick="closeSlideMenu()">
                <i class="fas fa-times"></i>
            </a>

            <a href="{{ route('usuario_painel_admin') }}">Home</a>
            <a href="{{ route('usuario_painel_admin_adicionar') }}">Adicionar Videos</a>
            <a href="{{ route('usuario_painel_admin_editar') }}">Editar Videos</a>
            <a href="{{ route('index') }}">Voltar para o site</a>

        </div>

        {{-- CONTEUDO DA PAGINA AQUI --}}
        <div class="contentPainel">
            @yield('conteudoPainel')
        </div>


    </div>

<script src="{{ asset('js/painel.js') }}"></script>
@endsection

