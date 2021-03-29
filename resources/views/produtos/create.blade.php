@extends('layouts.template')
@section('title','Criar Produtos')
@section('content')


<div class="container mt-4">

    <form action="{{ route('produtos.insert') }}" method="post">
        @csrf
        <div class="row">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="preco">Preço</label>
                <input type="number" step="0.01" name="preco" id="preco" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="quantidade">Quantidade</label>
                <input type="number" name="quantidade" id="quantidade" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea name="descricao" id="descricao" cols="30" rows="10" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary mt-4">Enviar</button>
            </div>
        </div>

    </form>

</div>


@endsection