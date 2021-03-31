<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use App\Models\Utilizadore;

class UtilizadoreController extends Controller
{
    //

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $utilizadores = Utilizadore::where('email', '=', $email)
            ->where('password', '=', $password)
            ->first();

        if (@$utilizadores->cod_util != null) {

            @session_start();
            // atribuir variaveis locais a variaveis de sessao
            $_SESSION["cod_util"] = $utilizadores->cod_util;
            $_SESSION["nome"] = $utilizadores->nome;
            $produtos = Produto::orderby('id', 'desc')->paginate();
            return view('produtos.index', ['produtos' => $produtos]);
        } else {
            echo "
            <script>
            window.alert('Dados incorretos');
            </script>
            
            ";
            return view('welcome');
        }
    }


    public function logout()
    {
        @session_start();
        @session_destroy();
        return view('welcome');
    }



    public function create(Request $request)
    {
        $utilizador = new Utilizadore();
        $utilizador->nome = $request->nome;
        $utilizador->nome_util = $request->nome_util;
        $utilizador->email = $request->email;
        $utilizador->password = $request->password;
        $utilizador->telefone = $request->telefone;
        $utilizador->morada = $request->morada;
        $utilizador->data_registo = date("Y-m-d H:i:s");

        $utilizador->save();
        return redirect()->route('home');
    }

    public function insert()

    {
        return view('utilizadores.create');
    }
}
