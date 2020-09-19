@extends('layouts.painel')
<body class="body-editar">

@section('conteudoPainel')
<br>
<h2 class="text-center text-white">Lista de Todos os Videos</h2>
<br><br>

<table class="table table-bordered table-dark painelLista">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Título</th>
        <th scope="col">Descrição</th>
        <th scope="col">Editar</th>
        <th scope="col">Excluir</th>
      </tr>
    </thead>
    <tbody>

        @foreach ($videoTable as $item)

        <tr>
            <th scope="row">{{ $item->id_video }}</th>
            <td>{{ $item->titulo }}</td>
            <td>{{ $item->descricao }}</td>
            <td class="text-center"><a style="color:yellow;" href="{{ asset('painel_admin_editar').'/'.$item->id_video }}"><i class="fas fa-edit"></i> </a></td>
            <td class="text-center"><a style="color:red;" href="#"><i class="fas fa-trash"></i> </a></td>

          </tr>
        </tbody>

        @endforeach

  </table>

@endsection

