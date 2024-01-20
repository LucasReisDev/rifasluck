@extends('layouts.main')

@section('title', 'RifasLuck')

@section('content')


<link rel="stylesheet" href="/css/style.css">
@if($rifa != null)

<p>

     Exibindo Id:
     {{ $rifa->id }}
</p>
@endif

<p> {{ $rifa->titulo }} </p>
<p> {{ $rifa->descricao }} </p>
<p> {{ $rifa->cotas_disponiveis }} </p>


@endsection

