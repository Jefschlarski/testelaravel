@extends('index')
@section('content')
<form method="POST" action="{{route('cadastrar.produto')}}">
    @csrf
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 >Cadastrar Produto</h1>
        </div>
        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" class="form-control @error('nome') is-invalid @enderror"  name="nome">
            @if ($errors->has('nome'))
                <div class="invalid-feedback">{{ $errors->first('nome')}}</div>
            @endif
          </div>
          <div class="mb-3">
            <label class="form-label">Valor</label>
            <input class="form-control @error('valor') is-invalid @enderror"  name="valor">
            @if ($errors->has('valor'))
                <div class="invalid-feedback">{{ $errors->first('valor')}}</div>
            @endif
          </div>
          <button type="submit" class="btn btn-success mt-2">Cadastrar</button>
  </form>    
@endsection