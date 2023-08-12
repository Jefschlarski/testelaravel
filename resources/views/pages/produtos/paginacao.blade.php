{{-- extends da index --}}
@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 >Produtos</h1>
    </div>
    <div>
        <form action="{{route('produto.index')}}" method="get">
            <input type="text" name="pesquisar" placeholder="Digite um nome">
            <button>Pesquisar</button>
            <a type="button" href="{{route('cadastrar.produto')}}" class="btn btn-success float-right">Incluir produto</a>
        </form>
       
      <div class="mt-4 table-responsive small">
        @if($findProduto->isEmpty())
        <p>Não Encontrado</p>
        @else
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Nome</th>
              <th scope="col">Valor</th>
              <th scope="col">Ações</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($findProduto as $produto)
            <tr>
              <td class="align-middle">{{$produto->nome}}</td>
              <td class="align-middle">{{'R$' . number_format($produto->valor, 2, ',', '.' )}}</td>
              <td>
                <a href="" class="btn btn-light btn-sm">Editar</a>
                <meta name="csrf-token" content="{{ csrf_token() }}"/>
                <a onclick="deleteRegistroPaginacao('{{route('produto.delete')}}', {{$produto->id}})" class="btn btn-danger btn-sm">Excluir</a>
              </td>
              </tr>  
            @endforeach
           
          </tbody>
        </table>
        @endif
      </div>
    </div>
@endsection