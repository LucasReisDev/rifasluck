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

                        <!-- Adicione esta seção para exibir os botões de compra de cotas -->
                        <div class="mb-3">
                            <label for="quantidade" class="form-label">Escolha a quantidade de cotas:</label>
                            <input type="number" class="form-control" id="quantidade" name="quantidade" required>
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-primary" onclick="adicionarCotas(10)">Adicionar 10 Cotas</button>
                            <button class="btn btn-primary" onclick="adicionarCotas(100)">Adicionar 100 Cotas</button>
                            <button class="btn btn-primary" onclick="adicionarCotas(1000)">Adicionar 1000 Cotas</button>
                        </div>
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#comprarModal">Comprar</button>



                        <p class="card-text">ID: {{ $rifa->id }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <!-- Modal de Compra -->
     <div class="modal fade" id="comprarModal" tabindex="-1" aria-labelledby="comprarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="comprarModalLabel">Informações de Compra</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <!-- Adicione aqui os campos para nome, email e número de celular -->
                <form id="formularioCompra" method="post" action="{{ route('pagamento.processar') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="nomeCompleto"
                         class="form-label">Nome Completo:</label>
                        <input type="text" class="form-control" id="nomeCompleto" name="nomeCompleto" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="numeroCelular" class="form-label">Número de Celular:</label>
                        <input type="text" class="form-control" id="numeroCelular" name="numeroCelular" required>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="finalizarCompra()">Finalizar Compra</button>
                </form>
            </div>
            </div>
        </div>
    </div>
@endif



<script>
    function adicionarCotas(quantidade) {
        // Lógica para adicionar a quantidade de cotas ao campo 'quantidade'
        var campoQuantidade = document.getElementById('quantidade');
        var valorAtual = parseInt(campoQuantidade.value);

        // Verifica se valorAtual é um número válido
        if (!isNaN(valorAtual)) {
            campoQuantidade.value = valorAtual + quantidade;
        } else {
            // Se não for um número válido, defina o valor inicial como zero
            campoQuantidade.value = quantidade;
        }
    }

    function comprarCotas(quantidade) {
        // Lógica para processar a compra da quantidade de cotas especificada
        alert('Adicionando ' + quantidade + ' cotas ao campo!');
        // Adicione aqui a lógica para o pagamento via pix, por exemplo, abrir um modal de pagamento
    }


    function finalizarCompra() {
    var quantidadeCotas = document.getElementById('quantidade').value;
    var nomeCompleto = document.getElementById('nomeCompleto').value;
    var email = document.getElementById('email').value;
    var numeroCelular = document.getElementById('numeroCelular').value;

    // Adicione aqui a lógica para enviar os dados para o backend
    fetch('/processar-pagamento', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            quantidade: quantidadeCotas,
            nomeCompleto: nomeCompleto,
            email: email,
            numeroCelular: numeroCelular,
        })
    })
    .then(response => response.json())
    .then(data => {
        // Após processar o pagamento, redirecione para a página com o QR Code
        //window.location.href = data.qrCodeUrl;
    })
    .catch(error => {
        console.error('Erro ao processar pagamento:', error);
        // Adicione aqui a lógica para lidar com erros
    });
}

    function comprarCota(numeroCota) {
        // Lógica para processar a compra da cota com o número 'numeroCota'
        alert('Cota ' + numeroCota + ' comprada!');
        // Adicione aqui a lógica para o pagamento via pix, por exemplo, abrir um modal de pagamento
    }
</script>
@endsection
