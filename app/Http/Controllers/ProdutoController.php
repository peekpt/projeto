<?php

namespace App\Http\Controllers;

use App\Models\Produto;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{

    public function index()
    {

        $produtos = Produto::orderby('id', 'desc')->paginate(2);

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

    // metodo para exibir a vista de descricao dos produtos

    public function show($id)
    {
        $produto = Produto::find($id);
        return view('produtos.show', ['produto' => $produto]);
    }

    public function modal($id)
    {
        $produtos = Produto::orderBy('id', 'desc')->paginate();
        return view('produtos.index', ['produtos' => $produtos, 'id' => $id]);
    }

    public function delete(produto $produto)
    {
        $produto->delete();
        return redirect()->route('produtos');
    }
}
