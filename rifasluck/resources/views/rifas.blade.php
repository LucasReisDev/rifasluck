@extends('layouts.main')
@section('title', 'RifasLuck')
@section('content')

<script>
  document.addEventListener('DOMContentLoaded', function () {
    var imagens = document.querySelectorAll('.img-fluid');

    imagens.forEach(function (imagem, index) {
      imagem.addEventListener('click', function () {
        var numeroRifa = index + 1; // Índice baseado em zero, adicionando 1 para obter o número da rifa
        window.location.href = '/rifa/' + numeroRifa;
      });
    });
  });
</script>
<style>
  .img-fluid {
    transition: transform 0.3s ease-in-out; /* Adiciona uma transição suave de 0.3 segundos */
  }

  .img-fluid:hover {
    transform: scale(1.1); /* Aumenta a escala em 10% ao passar o mouse sobre a imagem */
  }

  .img-fluid-container {
    position: relative; /* Para posicionar a descrição relativa à imagem */
  }

  .img-fluid-container p {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    background-color: rgba(255, 255, 255, 0.8); /* Fundo semi-transparente */
    padding: 10px;
    margin: 0;
    transition: opacity 0.3s ease-in-out; /* Adiciona uma transição de opacidade */
    opacity: 0; /* Inicialmente, a descrição é transparente */
  }

  .img-fluid-container:hover p {
    opacity: 1; /* Torna a descrição visível ao passar o mouse sobre a imagem */
  }
</style>

<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand"></a>
    <form class="d-flex" role="search">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Buscar</button>
    </form>

  </div>
</nav>
</nav>

<div id="rifas-container" class="col-md-20">
<div id="cards-container" class="row">
@foreach($rifas as $rifa)
<div class="card col-md-9">
    <img class="img-fluid mb-1" src="{{ asset('img/' . $rifa->image) }}" alt="">
        <div class="card-body">
                <h5>
                Título:{{ $rifa->titulo }}
                </h5>
                <p>
                Id:{{ $rifa->id }}
                </p>
            </div>
        </div>
 </div>
@endforeach
</div>

@endsection
