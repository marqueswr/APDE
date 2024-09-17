@extends('site.blank')
@section('titulo','ÁREA ADMINISTRATIVA')
@section('operacao','usuarios / listagem')
@section('titulo_pagina','Lista de usuários')
@section('content')
<div class="container">

    <div class="row gy-4" style=" text-align: center; ">
        @foreach ($usuarios as $item)

          <div class="card" style="width: 19%;text-align: center;margin-left:10px;background-color:rgba(255, 228, 196, 0.47)">
            <div style="text-align: center;">
            <img class="card-img-top mt-4" src="{{ $item->foto }}" alt="{{ $item->foto }}" style="width:120px; text-align: center;border-radius: 10px;border: 1px solid rgba(46, 46, 47, 0.352);box-shadow: 4px 4px 12px rgba(0, 0, 0, 0.86); ">
            </div>
            <div class="card-body">
              <h5 class="card-title nome-listagem" >{{ $item->codigo }} </br>{{ $item->name }} <span style="color: rgb(177, 88, 11);"><p>{{ $item->tipo }}</p></span></h5>
              <p class="card-text" style="font-size:11px">{{ $item->email }} </p>

{{--
              <form id="formExcluir{{ $item->id }}" action="{{ route('excluir.usuario',['usuario'=> $item-> id]) }}" method="POST">
                  @csrf
                  @method('delete') --}}
                  <a href="#" class="btn btn-outline-success btn-sm"><i class="bi bi-display"></i> </a>
                  <a class="btn btn-outline-primary btn-sm" href="{{ route('alterar.usuario',['usuario'=> $item->id]) }}" ><i class="bi bi-pen"></i></a>
                  <a class="btn btn-outline-danger btn-sm" href="{{ route('excluir.usuario',['usuario'=>$item->id]) }}" ><i class="bi bi-trash"></i></a></td>
                  {{-- </form> --}}
            </div>
          </div>

        @endforeach
      </div>

</div>
<div class="d-flex justify-content-center mt-3">
    {{ $usuarios->links() }}
</div>
@endsection
