{{-- Erros de Validação--}}
@if (count($errors) > 0)
    <div class="alert alert-danger alertBox">
        @if (count($errors) == 1)
            <p class="titulo-erro">ERRO:</p>
        @else
            <p class="titulo-erro">ERROS:</p>
        @endif
        <ul>
            @foreach ($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- Erros de Comunicação com Banco de Dados--}}
@if (isset($erros_bd))
    <div class="alert alert-danger alertBox">
        @foreach ($erros_bd as $erro)
            <p>{{ $erro }}</p>
        @endforeach
    </div>
@endif
