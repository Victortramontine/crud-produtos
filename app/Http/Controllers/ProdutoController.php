<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index(Request $request)
{
    $query = Produto::query();

    if ($request->has('search') && $request->search != '') {
        $query->where('nome', 'like', '%' . $request->search . '%');
    }

    $sortBy = $request->get('sort_by', 'id'); 
    $sortOrder = $request->get('sort_order', 'asc'); 

    $query->orderBy($sortBy, $sortOrder);

    $produtos = $query->paginate(10)->withQueryString(); 

    return view('produtos.index', compact('produtos', 'request'));
}

    public function update(Request $request, Produto $produto)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
            'preco' => 'required|numeric|min:0',
            'data_validade' => 'required|date',
        ]);

        $produto->update($request->all());

        return redirect()->route('produtos.index')
                         ->with('success', 'Produto atualizado com sucesso.');
    }

    public function destroy(Produto $produto)
    {
        $produto->delete();

        return redirect()->route('produtos.index')
                         ->with('success', 'Produto apagado com sucesso.');
    }
}