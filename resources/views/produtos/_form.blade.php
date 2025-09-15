@csrf
<div class="form-group mb-3">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror" id="nome" value="{{ old('nome', $produto->nome ?? '') }}">
    @error('nome')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group mb-3">
    <label for="descricao">Descrição:</label>
    <textarea name="descricao" class="form-control @error('descricao') is-invalid @enderror" id="descricao" rows="3">{{ old('descricao', $produto->descricao ?? '') }}</textarea>
    @error('descricao')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group mb-3">
    <label for="preco">Preço:</label>
    <input type="number" step="0.01" name="preco" class="form-control @error('preco') is-invalid @enderror" id="preco" value="{{ old('preco', $produto->preco ?? '') }}">
    @error('preco')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group mb-3">
    <label for="data_validade">Data de Validade:</label>
    <input type="date" name="data_validade" class="form-control @error('data_validade') is-invalid @enderror" id="data_validade" value="{{ old('data_validade', $produto->data_validade ?? '') }}">
    @error('data_validade')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-check mb-3">
    <input type="hidden" name="ativo" value="0">
    <input type="checkbox" name="ativo" class="form-check-input" id="ativo" value="1" {{ (old('ativo', $produto->ativo ?? false)) ? 'checked' : '' }}>
    <label class="form-check-label" for="ativo">Ativo</label>
</div>
<a href="{{ route('produtos.index') }}" class="btn btn-secondary">Voltar</a>
<button type="submit" class="btn btn-primary">{{ $buttonText ?? 'Salvar' }}</button>