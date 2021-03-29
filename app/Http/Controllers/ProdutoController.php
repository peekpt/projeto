<?php

namespace App\Http\Controllers;

use App\Models\Produto;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{

    public function index()
    {

        $produtos = Produto::orderby('id', 'desc')->paginate();

        return view('produtos.index', ['produtos' => $produtos]);
    }
    //
    public function create()
    {
        // exibe a vista no controlador
        return view('produtos.create');
    }
    public function insert(Request $request)
    {
        $produto = new Produto();
        $produto->nome = $request->nome;
        $produto->preco = $request->preco;
        $produto->quantidade = $request->quantidade;
        $produto->descricao = $request->descricao;
        $produto->save();
        return redirect('produtos');
    }

    // exibir o formulário para edição  de 1 produto específico
    public function edit(produto $produto)
    {
        return view('produtos.edit', ['produto' => $produto]);
    }

    // criar  o método para actualizar o produto

    public function editar(Request $request, produto $produto)
    {
        $produto->nome = $request->nome;
        $produto->preco = $request->preco;
        $produto->quantidade = $request->quantidade;
        $produto->descricao = $request->descricao;
        $produto->save();
        return redirect()->route('produtos');
    }
}
