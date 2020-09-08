<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>JAOFLIX</title>

    <!-- Bootstrap -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  </head>
  <body>

  <div class="container">

      {{-- header --}}
      @include('templates.header')

      {{-- conteúdo --}}
      @yield('conteudo')

  </div>


    <!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Inclui todos os plugins compilados (abaixo), ou inclua arquivos separadados se necessário -->

  </body>
</html>
