<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"  crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"  crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="/img/out-0.png" type="image/png">

</head>
<body>
<header>
    <h1 style="text-align: center;">RifasLuck</h1>
<img style="margin: 10px;" src="/img/out-0.png" class="rounded mx-auto d-block" alt="...">


<nav class="navbar bg-body-tertiary navbar-expand">

  <div style="flex-direction: column-reverse;" class="container-fluid ">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div style="" class="collapse navbar-collapse text-center " id="navbarNavAltMarkup">
      <div class="navbar-nav">
        @guest
        <a id="crieRifaLink" class="nav-link active" aria-current="page" href="#">Seja nosso parceiro</a>
        @endguest
        <a class="nav-link" href="/rifas">Rifas Disponíveis</a>
        @auth
        <a id="nav-link" href="/dashboard" class="nav-link active" aria-current="page" href="#">Criar rifa</a>
        <form action="/logout" method="POST">
            @csrf
        <a id="nav-link" href="/logout" class="nav-link active" aria-current="page" onclick="event.preventDefault();
        this.closest('form').submit();">Sair</a>
        </form>
        @endauth
      </div>
    </div>
  </div>
</header>
<div class="modal fade" id="modalRegistroLogin" tabindex="-1" aria-labelledby="modalRegistroLoginLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalRegistroLoginLabel">Realizar Cadastro ou Fazer Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <a href="{{ route('register') }}" class="btn btn-primary">Registrar</a>
      <a href="{{ route('login') }}" class="btn btn-success">Entrar</a>
      </div>
    </div>
  </div>
</div>
@yield('content')
<section>
        <h2>Como Funciona</h2>
        <p>Descubra como criar suas próprias rifas e participar das existentes.</p>
        <a href="/como-funciona">Saiba mais</a>
    </section>


    <footer>
        <p>&copy; 2024 RifasLuck. Todos os direitos reservados.  @Lareistech</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="" crossorigin="anonymous"></script>
    <script>
 document.addEventListener('DOMContentLoaded', function () {
    var formularioRegistroLogin = document.getElementById('modalRegistroLogin');

    // Adicionando evento de exibição do modal ao clicar no link
    $('#crieRifaLink').on('click', function (e) {
      e.preventDefault();
      $('#modalRegistroLogin').modal('show');
    });

    // Escondendo o modal ao clicar nos botões dentro do modal
    $('#formularioRegistro, #formularioLogin').on('submit', function () {
      $('#modalRegistroLogin').modal('hide');
    });
  });
    </script>
</body>
</html>
