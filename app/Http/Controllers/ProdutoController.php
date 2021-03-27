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
    }
}
