@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Novo Produto</h1>
    <form action="{{ route('produtos.store') }}" method="POST">
        @include('produtos._form', ['buttonText' => 'Criar Produto'])
    </form>
</div>
@endsection