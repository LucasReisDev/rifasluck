@extends('layouts.main')

@section('title', 'RifasLuck')

@section('content')


<link rel="stylesheet" href="/css/style.css">
@if($rifa != null)
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <img style="height: 50%;" src="{{ asset('img/' . $rifa->image) }}" class="card-img-top img-fluid" alt="{{ $rifa->titulo }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $rifa->titulo }}</h5>
                        <p class="card-text">{{ $rifa->descricao }}</p>
                        <p class="card-text">Cotas disponíveis: {{ $rifa->cotas_disponiveis }}</p>
                        <p class="card-text">ID: {{ $rifa->id }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

@endsection
