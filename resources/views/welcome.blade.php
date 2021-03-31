@extends('layouts.template')
@section('title','Homepage')
@section('content')



<?php
@session_start();
if(@$_SESSION["cod_util"] != null) {
    echo "
    <script>
     window.location='./produtos';    
    </script>
    ";
}
?>


<div id="login.row" class="row justify-content-center align-items-center">
    <div id="login-column" class="col-md-6">
        <div id="login-box" class="col-md-6">
        <form id="login-form"  class="form" action="{{ route('utilizadores.login') }}" method="post">
            @csrf
            <h3 class="text-center text-info">Login</h3>
            <div class="form-group">
                <label for="email" class="text-info">Email:</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="password" class="text-info">Password:</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" value="submit" class="btn btn-info btn-md mt-2" value="Login">
            </div>       
        </form>        
        </div>
    </div>
</div>

@endsection