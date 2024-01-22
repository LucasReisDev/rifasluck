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
    <section>
    <h2 style="text-align: center;">Rifas em Destaque</h2>
    <div class="container mt-3">
        <div class="row">
            <div class="col-sm12 col-md-2">
                <img  style="margin-left:10%; height:60%" class="img-fluid mb-1 " src="/img/iph.png" alt="" >
                <p style="margin-left:15%;">iphone 15 - ou 10 mil no pix</p>
            </div>
            <div class="col-sm12 col-md-2">
                <img style="margin-left:10%;" class="img-fluid mb-1" src="/img/car.jpg" alt="" >
                <p style="margin-left:15%;">Toro - ou 50 mil no pix</p>
            </div>
            <div class="col-sm12 col-md-2">
                <img style="margin-left:10%;" class="img-fluid mb-1" src="/img/mt.png" alt="" >
                <p style="margin-left:15%;">MT 03 - ou 20mil no pix </p>
            </div>

        </div>
    </div>
    </section>
@endsection

