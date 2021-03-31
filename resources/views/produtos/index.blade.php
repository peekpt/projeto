@extends('layouts.template')
@section('title','Lista de Produtos')
@section('content')

<?php
@session_start();
if(@$_SESSION["cod_util"] == null) {
    echo "
    <script>
     window.location='./';    
    </script>
    ";
}
?>

<?php
if(!isset($id)){
     // para que a variavel nao esteja indefinida
    $id="";
}
?>
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
                    <td style="width:90px;">{{$produto->preco}}</td>
                    <td style="width:40px;">{{$produto->quantidade}}</td>
                    <td style="width:120px;">
                        <a href="{{ route('produtos.descricao',$produto->id) }}"><i class="fas fa-eye text-primary me-3"></i></a>
                        <a href="{{ route('produtos.edit',$produto) }}"><i class="fas fa-edit text-info me-3"></i></a>
                        <a href="{{ route('produtos.modal',$produto) }}"><i class="fas fa-trash text-danger me-3"></i></a>
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        
        {{-- <div>{{ $produtos->links() }}</div> --}}
            
    </div>
</div>


<script>

    $(document).ready( function (){
        $('#dataTable').DataTable();
    });
</script>
@endsection


@section('modal')

<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
  </button> --}}

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Remover Produto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Deseja realmente excluir {{ $id }}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
<form action="{{ route('produtos.delete', $id) }}" method="post">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-danger">Remover</button>
</form>
          

        </div>
      </div>
    </div>
  </div>
  <?php if($id != ""): ?>
    
        
        <script>
            var myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
            myModal.show();
        </script>

      
   <?php endif; ?>
    
    


@endsection