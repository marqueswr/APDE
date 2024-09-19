@extends('site.blank')
@section('titulo','ÁREA ADMINISTRATIVA')
@section('operacao','usuarios / visualizar')
@section('titulo_pagina','Visualizar dados do usuário')
@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-2" style="text-align: center"></div>
    <div class="col-md-8 " style="text-align:center">
        <img  src="{{ '/' . $usuario->foto }}" style="width:250px; text-align: center;border-radius: 10px;border: 1px solid rgba(46, 46, 47, 0.352);box-shadow: 4px 4px 12px rgba(0, 0, 0, 0.86); ">
    </br></br>
         <label class="label-verde"><b>CÓDIGO:</b> <span class="input-fundo">{{ $usuario->codigo }}</span></label></br>
          <label class="label-verde"><b>NOME:</b> <span class="input-fundo">{{ $usuario->name }}</span></label></br>
          <label class="label-verde"><b>ENDEREÇO DE E-MAIL:</b> <span class="input-fundo"> {{ $usuario->email }}</span></label></br>
          <label class="label-verde"><b>TIPO DE USUÁRIO:</b> <span class="input-fundo">{{ $usuario->tipo }}</span></label></br>
          <label class="label-verde"><b>NIVEL DE ACESSO:</b> <span class="input-fundo">{{ $usuario->access_level }}</span></label>

</br></br>
          <p><a href="{{ route('listar.usuarios') }}" style="text-align: center" class="btn btn-outline-success"><i class="bi bi-arrow-return-left"></i>&nbsp&nbsp Retornar para listagem</a></p>

      </div>
      <div class="col-md-2"></div>
    </div>




@endsection


