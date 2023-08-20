{{-- extends da index --}}
@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 >Usuario</h1>
    </div>
    <div>
        <form action="{{route('usuario.index')}}" method="get">
            <input type="text" name="pesquisar" placeholder="Digite um nome">
            <button>Pesquisar</button>
            <a type="button" href="{{route('cadastrar.usuario')}}" class="btn btn-success float-right">Cadastrar Usuario</a>
        </form>
       
      <div class="mt-4 table-responsive small">
        @if($findUsuario->isEmpty())
        <p>Não Encontrado</p>
        @else
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Nome</th>
              <th scope="col">Email</th>
              <th scope="col">Ações</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($findUsuario as $usuario)
            <tr>
              <td class="align-middle">{{$usuario->name}}</td>
              <td class="align-middle">{{$usuario->email}}</td>
              <td>
                <a href="{{route('atualizar.usuario', $usuario->id)}}" class="btn btn-light btn-sm">Editar</a>
                <meta name="csrf-token" content="{{ csrf_token() }}"/>
                <a onclick="deleteRegistroPaginacao('{{route('usuario.delete')}}', {{$usuario->id}})" class="btn btn-danger btn-sm">Excluir</a>
              </td>
              </tr>  
            @endforeach
           
          </tbody>
        </table>
        @endif
      </div>
    </div>
@endsection