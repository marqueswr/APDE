@extends('site.blank')
@section('titulo','ÁREA ADMINISTRATIVA')
@section('operacao','usuarios / Alterar')
@section('titulo_pagina','Alterar dados do usuário')
@section('content')


<div class="container">
    <div style="text-align: left;">
        <img class="card-img-top mt-4" src="{{ '/' . $usuarioAlterar->foto }}" style="width:120px; text-align: center;border-radius: 10px;border: 1px solid rgba(46, 46, 47, 0.352);box-shadow: 4px 4px 12px rgba(0, 0, 0, 0.86); ">
        </div>
    </br>
    <form  action="{{ route('criar.usuario') }}" method="POST" enctype="multipart/form-data">
        @csrf
<div class="row">
    <div class="form-group mb-4 col-md-2">
        <label for="codigo" class="pb-2 label-verde" >Código</label>
        <input type="text" class="form-control input-fundo" id="codigo" name="codigo" value="{{ old('codigo', $usuarioAlterar->codigo) }}" aria-describedby="codigo" >
       <small style="color:red">@error('codigo'){{ $message }}@enderror</small>

    </div>

        <div class="form-group mb-4 col-md-6">
            <label for="name" class="pb-2 label-verde" >Nome</label>
            <input type="text" class="form-control input-fundo" id="name" name="name" value="{{ old('name', $usuarioAlterar->name)  }}" aria-describedby="name" >
            <small style="color:red">@error('nome'){{ $message }}@enderror</small>
        </div>

        <div class="form-group mb-4 col-md-4">
            <label for="email" class="pb-2 label-verde" >E-mail</label>
          <input type="email" class="form-control input-fundo" id="email" name="email" value="{{ old('email', $usuarioAlterar->email)  }}"  aria-describedby="email" >
          <small style="color:red">@error('email'){{ $message }}@enderror</small>
        </div>
</div>

<div class="row">
          <div class="form-group mb-4 col-md-6">
            <label for="access_level" class="pb-2 label-verde" >Nível de acesso</label>
           <select class="form-select input-fundo" name="access_level" id="access_level">
                @foreach($niveis as $item)
                <option value="{{ $item }}"{{ old('access_level', $usuarioAlterar->nivel) == $item ? 'selected' : '' }}>
                    {{ $usuarioAlterar->access_level }}</option>
                @endforeach
            </select>
            <small style="color:red">@error('access_level'){{ $message }}@enderror</small>
          </div>

          <div class="form-group mb-4 col-md-6">
            <label for="tipo" class="pb-2 label-verde" >Tipo de usuário</label>
            <select class="form-select input-fundo" name="tipo" id="tipo">

                 @foreach($tipos as $item)
                 <option value="{{ $item }}"{{ old('tipo', $usuarioAlterar->tipo) == $item ? 'selected' : '' }}>
                 {{ $usuarioAlterar->tipo }}</option>
                 @endforeach
             </select>
             <small style="color:red">@error('tipo'){{ $message }}@enderror</small>
           </div>
        </div>

      
        <button type="submit" class="btn btn-outline-primary"><i class="bi bi-floppy"></i>&nbsp&nbsp Gravar</button>
        <a href="{{ route('listar.usuarios') }}" class="btn btn-outline-success"><i class="bi bi-arrow-return-left"></i>&nbsp&nbsp Retornar para listagem</a>
      </form>
</div>

@endsection
