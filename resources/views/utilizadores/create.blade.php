@extends('layouts.template')
@section('title','Criar Utilizador')
@section('content')

<?php
@session_start();
if(@$_SESSION["cod_util"] == null) {
    echo "
    <script>
     window.location='../';    
    </script>
    ";
}
?>


<div class="container">
    <h3 class="mt-3">Criar Utilizador</h3>

    <div class="container mt-4">

        <form action="{{ route('utilizadores.create') }}" method="post">
            @csrf
    
            <div class="row">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="nome_util">Nome de Utilizador</label>
                    <input type="text" name="nome_util" id="nome_util" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
              
                
                <div class="form-group">
                    <label for="telefone">Telefone</label>
                    <input type="number" name="telefone" id="telefone" class="form-control" required>
                </div>
    
                <div class="form-group">
                    <label for="morada">Morada</label>
                    <textarea name="morada" id="morada" cols="30" rows="10" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary mt-4">Criar</button>
                </div>
            </div>
    
        </form>
    
    </div>
</div>


@endsection