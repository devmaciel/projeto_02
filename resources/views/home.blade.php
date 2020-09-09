@extends('layouts.app')

@section('conteudo')

    {{-- BANNER --}}
    <section class="banner">

        <video autoplay muted id="video-destaque">
            <source src="{{ asset('videos/kh3trailerSHORT720.mp4') }}" type="video/mp4">
            Your browser does not support HTML5 video.
        </video>

        <div class="overlay"></div>

        <div class="texto-destaque">
			<h2>Kingdom Hearts III</h2>
			<h3>Trailer de lançamento pra plataforma PC(steam)</h3>
			<p>Imagina se fosse verdade, seria um sonho.</p>
			<br />
			<a href="#"><i class="fas fa-play"></i> Assistir</a>
			<a href="#"><i class="fab fa-steam"></i> Comprar</a>
			<a href="#"><i class="fas fa-globe-americas"></i> Site</a>
		</div>


    </section>



    {{-- CAROUSELS --}}


@endsection
