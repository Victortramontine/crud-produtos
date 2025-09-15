@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes do Produto</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><strong>Nome:</strong> {{ $produto->nome }}</h5>
            <p class="card-text"><strong>Descrição:</strong> {{ $produto->descricao }}</p>
            <p class="card-text"><strong>Preço:</strong> R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
            <p class="card-text"><strong>Data de Validade:</strong> {{ \Carbon\Carbon::parse($produto->data_validade)->format('d/m/Y') }}</p>
            <p class="card-text"><strong>Status:</strong> {{ $produto->ativo ? 'Ativo' : 'Inativo' }}</p>
        </div>
    </div>
    <a href="{{ route('produtos.index') }}" class="btn btn-secondary mt-3">Voltar</a>
</div>
@endsection