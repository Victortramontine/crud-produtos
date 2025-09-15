@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Lista de Produtos</h1>
        <a href="{{ route('produtos.create') }}" class="btn btn-primary">Novo Produto</a>
    </div>

    <form action="{{ route('produtos.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Buscar por nome..." value="{{ $request->search }}">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Buscar</button>
            </div>
        </div>
    </form>

    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th><a href="{{ route('produtos.index', ['sort_by' => 'id', 'sort_order' => $request->get('sort_order') == 'asc' ? 'desc' : 'asc']) }}">ID</a></th>
                <th><a href="{{ route('produtos.index', ['sort_by' => 'nome', 'sort_order' => $request->get('sort_order') == 'asc' ? 'desc' : 'asc']) }}">Nome</a></th>
                <th><a href="{{ route('produtos.index', ['sort_by' => 'preco', 'sort_order' => $request->get('sort_order') == 'asc' ? 'desc' : 'asc']) }}">Preço</a></th>
                <th>Ativo</th>
                <th width="280px">Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($produtos as $produto)
            <tr>
                <td>{{ $produto->id }}</td>
                <td>{{ $produto->nome }}</td>
                <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                <td>{{ $produto->ativo ? 'Sim' : 'Não' }}</td>
                <td>
                    <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST">
                        <a class="btn btn-info btn-sm" href="{{ route('produtos.show', $produto->id) }}">Ver</a>
                        <a class="btn btn-primary btn-sm" href="{{ route('produtos.edit', $produto->id) }}">Editar</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja apagar este produto?')">Apagar</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Nenhum produto encontrado.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    {!! $produtos->links() !!}
</div>
@endsection