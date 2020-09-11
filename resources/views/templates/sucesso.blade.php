{{-- Mensagem de Sucesso de Criação de Conta --}}
@if (isset($mensagem_sucesso))
    <div class="alert alert-success alertBox">
        @foreach ($mensagem_sucesso as $sucesso)
            <p class="titulo-sucesso">{{ $sucesso }}</p>
        @endforeach
    </div>
@endif
