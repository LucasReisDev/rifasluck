@extends('layouts.main')
@section('title', 'RifasLuck')
@section('content')


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
@if($busca != '')
<p>O usuario esta buscando a rifa {{ $busca }}</p>
@endif



@endsection
