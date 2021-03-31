<?php

use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UtilizadoreController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * Os parâmetros de url {parametro} são passados à função chamada por ordem posicional
 * 
 */

Route::get('/', HomeController::class)->name('home');

// rota para a form de inserir produto
Route::get('produtos/inserir', [ProdutoController::class, 'create'])->name('produtos.inserir');
// rota que insere um produto POST
Route::post('produtos', [ProdutoController::class, 'insert'])->name('produtos.insert');

// mostrar a página de edição de produtos
Route::get('produtos/{produto}/edit', [ProdutoController::class, 'edit'])->name('produtos.edit');

// chamar o metodo para guardar as alterações na db
Route::put('produtos/{produto}', [ProdutoController::class, 'editar'])->name('produtos.editar');

// rota para a mostrar os detalhes de um produto
Route::get('produtos/{id}', [ProdutoController::class, 'show'])->name('produtos.descricao');

// rota para exibir produtos
Route::get('produtos', [ProdutoController::class, 'index'])->name('produtos');

// para exibir uma janela modal a solicitar a confirmação do remover o registo 
Route::get('produtos/{produto}/delete', [ProdutoController::class, 'modal'])->name('produtos.modal');

// rota para remover registo
Route::delete('produtos/{produto}', [ProdutoController::class, 'delete'])->name('produtos.delete');


// login
Route::post('painel', [UtilizadoreController::class, 'login'])->name('utilizadores.login');


//logout

Route::get('logout', [UtilizadoreController::class, 'logout'])->name('utilizadores.logout');


Route::get('utilizadores/inserir', [UtilizadoreController::class, 'insert'])->name('utilizadores.insert');

Route::post('utilizadores', [UtilizadoreController::class, 'create'])->name('utilizadores.create');
