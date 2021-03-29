@extends('layouts.template')
@section('title','Editar Produto')
@section('content')


<div class="container mt-4">

    <form action="{{ route('produtos.editar',$produto) }}" method="post">
        @csrf
        @method('put')
        <div class="row">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input value="{{ $produto->nome }}" type="text" name="nome" id="nome" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="preco">Preço</label>
                <input value="{{ $produto->preco }}" type="number" step="0.01" name="preco" id="preco" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="quantidade">Quantidade</label>
                <input value="{{ $produto->quantidade }}" type="number" name="quantidade" id="quantidade" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea name="descricao" id="descricao" cols="30" rows="10" class="form-control" required>{{ $produto->descricao }}</textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary mt-4">Alterar</button>
            </div>
        </div>

    </form>

</div>


@endsection