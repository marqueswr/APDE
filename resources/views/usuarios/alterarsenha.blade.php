@extends('site.blank')
@section('titulo','ÁREA ADMINISTRATIVA')
@section('operacao','usuarios / alterar')
@section('titulo_pagina','Alterar senha de usuário')
@section('content')


<div class="container">
    <form  action="{{ route('alterar.senha',['id' => $id]) }}" method="POST">
        @csrf
<div class="row">
    <div class="form-group mb-4 col-md-6">
        <label for="password" class="pb-2 label-verde" >Digite a nova senha</label>
        <input type="password" class="form-control input-fundo" id="password" name="password"  aria-describedby="password" >
       <small style="color:red">@error('password'){{ $message }}@enderror</small>

    </div>

        <div class="form-group mb-4 col-md-6">
            <label for="newpassword" class="pb-2 label-verde" >Confirme a senha</label>
            <input type="password" class="form-control input-fundo" id="newpassword" name="newpassword"  aria-describedby="name" >
            <small style="color:red">@error('newpassword'){{ $message }}@enderror</small>
        </div>
    </div>
    <button type="submit" class="btn btn-outline-primary"><i class="bi bi-floppy"></i>&nbsp&nbsp Gravar</button>
    <a href="{{ route('listar.usuarios') }}" class="btn btn-outline-success"><i class="bi bi-arrow-return-left"></i>&nbsp&nbsp Retornar para listagem</a>
  </form>

</div>

</div>

@endsection
