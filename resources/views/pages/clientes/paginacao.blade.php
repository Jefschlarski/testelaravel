{{-- extends da index --}}
@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 >Clientes</h1>
    </div>
    <div>
        <form action="{{route('cliente.index')}}" method="get">
            <input type="text" name="pesquisar" placeholder="Digite um nome">
            <button>Pesquisar</button>
            <a type="button" href="{{route('cadastrar.cliente')}}" class="btn btn-success float-right">Cadastrar Cliente</a>
        </form>
       
      <div class="mt-4 table-responsive small">
        @if($findCliente->isEmpty())
        <p>Sem dados</p>
        @else
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Nome</th>
              <th scope="col">Email</th>
              <th scope="col">Endereço</th>
              <th scope="col">Logradouro</th>
              <th scope="col">Cep</th>
              <th scope="col">Bairro</th>
              <th scope="col">Ações</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($findCliente as $cliente)
            <tr>
              <td class="align-middle">{{$cliente->nome}}</td>
              <td class="align-middle">{{$cliente->email}}</td>
              <td class="align-middle">{{$cliente->endereco}}</td>
              <td class="align-middle">{{$cliente->logradouro}}</td>
              <td class="align-middle">{{$cliente->cep}}</td>
              <td class="align-middle">{{$cliente->bairro}}</td>
              <td>
                <a href="{{route('atualizar.cliente', $cliente->id)}}" class="btn btn-light btn-sm">Editar</a>
                <meta name="csrf-token" content="{{ csrf_token() }}"/>
                <a onclick="deleteRegistroPaginacao('{{route('cliente.delete')}}', {{$cliente->id}})" class="btn btn-danger btn-sm">Excluir</a>
              </td>
              </tr>  
            @endforeach
           
          </tbody>
        </table>
        @endif
      </div>
    </div>
@endsection