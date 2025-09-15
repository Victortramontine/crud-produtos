<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index(Request $request)
{
    // Inicia a query
    $query = Produto::query();

    // Verifica se há um termo de busca
    if ($request->has('search') && $request->search != '') {
        $query->where('nome', 'like', '%' . $request->search . '%');
    }

    // Verifica se há um parâmetro de ordenação
    $sortBy = $request->get('sort_by', 'id'); // Padrão: ordenar por id
    $sortOrder = $request->get('sort_order', 'asc'); // Padrão: ascendente

    $query->orderBy($sortBy, $sortOrder);

    // Executa a query com paginação
    $produtos = $query->paginate(10)->withQueryString(); // withQueryString mantém os parâmetros na paginação

    return view('produtos.index', compact('produtos', 'request'));
}

    public function update(Request $request, Produto $produto)
    {
        // Validação dos dados do formulário
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
            'preco' => 'required|numeric|min:0',
            'data_validade' => 'required|date',
        ]);

        // Atualiza o produto com os novos dados
        $produto->update($request->all());

        // Redireciona para a lista com uma mensagem de sucesso
        return redirect()->route('produtos.index')
                         ->with('success', 'Produto atualizado com sucesso.');
    }

    public function destroy(Produto $produto)
    {
        // Apaga o produto
        $produto->delete();

        // Redireciona para a lista com uma mensagem de sucesso
        return redirect()->route('produtos.index')
                         ->with('success', 'Produto apagado com sucesso.');
    }
}