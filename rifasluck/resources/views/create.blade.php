@extends('layouts.main')

@section('title', 'Criar Rifa')

@section('content')
    <h2>Criar Nova Rifa</h2>

    <form method="post" action="{{ route('rifas.store') }}">
        @csrf
        <div class="mb-3">
            <label for="image" class="form-label">Inserir Imagem</label>
            <input type="file" class="from-control-file" id="image" name="image" required>
        </div>
        <!-- Adicione aqui os campos do formulário para criar a rifa -->
        <div class="mb-3">
            <label for="titulo" class="form-label">Título da Rifa</label>
            <input type="text" class="form-control" id="titulo" name="titulo" required>
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição da Rifa</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="cotas_disponiveis" class="form-label">Número de Cotas Disponíveis</label>
            <input type="number" class="form-control" id="cotas_disponiveis" name="cotas_disponiveis" required>
        </div>

        <button type="submit" class="btn btn-primary">Criar Rifa</button>
    </form>
@endsection
