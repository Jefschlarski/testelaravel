{{-- extends da index --}}
@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 >Vendas</h1>
    </div>
    <div>
        <form action="{{route('venda.index')}}" method="get">
            <input type="text" name="pesquisar" placeholder="Numero da venda">
            <button>Pesquisar</button>
            <a type="button" href="{{route('cadastrar.venda')}}" class="btn btn-success float-right">Cadastrar Vendas</a>
        </form>
       
      <div class="mt-4 table-responsive small">
        @if($findVenda->isEmpty())
        <p>Sem dados</p>
        @else
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Numero da venda</th>
              <th scope="col">Produto</th>
              <th scope="col">Cliente</th>
              <th scope="col">Ações</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($findVenda as $venda)
            <tr>
              <td class="align-middle">{{$venda->numero_da_venda}}</td>
              <td class="align-middle">{{$venda->produto->nome}}</td>
              <td class="align-middle">{{$venda->cliente->nome}}</td>
              <td>
                <a href="" class="btn btn-light btn-sm">Enviar Email</a>
              </td>
              </tr>  
            @endforeach
           
          </tbody>
        </table>
        @endif
      </div>
    </div>
@endsection