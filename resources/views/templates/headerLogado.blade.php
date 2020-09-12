<header>
    <ul class="nav nav-desktop">
        <a href="{{ asset('/') }}" ><img class="img-logo" src="{{ asset('images/jaoflix.jpg') }}" alt="logotipo"></a>

        <li class="nav-item">
            <a class="nav-link" href="#">Inicio</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#">Séries</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#">Filmes</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#">Infantil</a>
        </li>

        <li>
            <i class="fas fa-search"></i>
            <input type="text" class="form-control" placeholder="Buscar">
        </li>

        <li>

            <div class="dropdown">
                <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Sua Lista</a>
                    <a class="dropdown-item" href="{{ asset('editar_perfil') }}">Editar Perfil</a>
                    <a class="dropdown-item" href="{{ asset('usuario_logout') }}">Sair</a>
                </div>
            </div>

            <div class="img-wraper"><img src="{{ asset('images/edith.jpg') }}" alt="Imagem do Usuário"></div>
            <p>João Pedro Maciel</p>

        </li>

    </ul>


    <div class="mobile-menu-wrapper">
        <nav class="mobile-menu">
            <ul>
                <li><a href="#servicos">Séries</a></li>
                <li><a href="#sobre">Filmes</a></li>
                <li><a href="#contato">Infantil</a></li>
                <li><a href="#contato">Sua Lista</a></li>
                <li><a href="#contato">Editar Perfil</a></li>
                <li><a href="#contato">Sair</a></li>
                <li><a></a></li>
            </ul>
        </nav>
    </div>


    <div class="clear"></div><!--clear-->

</header>

