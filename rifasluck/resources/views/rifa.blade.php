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

                        <!-- Adicione esta seção para exibir os blocos de cotas -->
                        <div class="row">
                            @for($i = 1; $i <= $rifa->cotas_disponiveis; $i++)
                                <div class="col-3 mb-2">
                                    <button class="btn btn-primary btn-block" onclick="comprarCota({{ $i }})">Cota {{ $i }}</button>
                                </div>
                            @endfor
                        </div>

                        <p class="card-text">ID: {{ $rifa->id }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

<script>
    function comprarCota(numeroCota) {
        // Lógica para processar a compra da cota com o número 'numeroCota'
        alert('Cota ' + numeroCota + ' comprada!');
        // Adicione aqui a lógica para o pagamento via pix, por exemplo, abrir um modal de pagamento
    }
</script>

@endsection
