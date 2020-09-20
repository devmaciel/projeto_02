<header>
    <ul class="nav nav-desktop">
        <a href="{{ asset('/') }}" ><img class="img-logo" src="{{ asset('images/jaoflix.jpg') }}" alt="logotipo"></a>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('index') }}">Inicio</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#series">Séries</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#filmes">Filmes</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#infantil">Infantil</a>
        </li>

        <li>
            <i class="fas fa-search"></i>
            <input type="text" class="form-control" placeholder="Buscar">
        </li>

        <li>

            <div class="dropdown">
                <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    @if (session('isAdmin') == 1)
                        <a class="dropdown-item" href="{{ asset('painel_admin') }}">Painel do Admin</a>
                    @endif
                    <a class="dropdown-item" href="{{ asset('editar_perfil') }}">Editar Perfil</a>
                    <a class="dropdown-item" href="{{ asset('usuario_logout') }}">Sair</a>
                </div>
            </div>

            @if (session('imagem') == '')
                <div class="img-wraper">
                    <div class="avatar-usuario-header">
                        <i class="fas fa-user"></i>
                    </div>
                </div>
            @else
                <div class="img-wraper"><img src="{{ asset('images/uploads/'.session('imagem')) }}" alt="Imagem do Usuário"></div>
            @endif

            @if (session('isAdmin') == 1)
                <p class="nome_admin">{{ session('nome') }}</p>
            @else
                <p>{{ session('nome') }}</p>
            @endif


        </li>

    </ul>


    <div class="mobile-menu-wrapper">
        <nav class="mobile-menu">
            <ul>
                @if (session('isAdmin') == 1)
                <li><a class="dropdown-item" href="{{ asset('painel_admin') }}">Painel do Admin</a></li>
                @endif
                <li><a href="#series">Séries</a></li>
                <li><a href="#filmes">Filmes</a></li>
                <li><a href="#infatil">Infantil</a></li>
                <li><a href="{{ asset('editar_perfil') }}">Editar Perfil</a></li>
                <li><a href="{{ asset('usuario_logout') }}">Sair</a></li>
                <li><a></a></li>
            </ul>
        </nav>
    </div>


    <div class="clear"></div><!--clear-->

</header>

