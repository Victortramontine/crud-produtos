@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Produto</h1>
    <form action="{{ route('produtos.update', $produto->id) }}" method="POST">
        @method('PUT')
        @include('produtos._form', ['produto' => $produto, 'buttonText' => 'Atualizar Produto'])
    </form>
</div>
@endsection