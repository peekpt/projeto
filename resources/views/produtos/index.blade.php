@extends('layouts.template')
@section('title','Lista de Produtos')
@section('content')

<a href="{{route('produtos.inserir')}}" type="button" class="mt-4 mb-4 btn btn-primary">Inserir Produtos</a>
<div class="card shadow mb-4">
    <div class="card-body">
        <table class="table table-bordered" id="dataTable" width="100%">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produtos as $produto)
                <tr>
                    <td>{{$produto->nome}}</td>
                    <td>{{$produto->preco}}</td>
                    <td>{{$produto->quantidade}}</td>
                    <td>
                        <a href="{{ route('produtos.edit',$produto) }}"><i class="fa fa-edit text-info me-3"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection