

@extends('index')
@section('content')
<form method="POST" action="{{route('atualizar.usuario', $findUsuario->id)}}">
    @csrf
    @method('PUT')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 >Editar Usuario</h1>
        </div>
        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" value="{{ isset($findUsuario->name) ? $findUsuario->name : @old('name')}}" class="form-control @error('name') is-invalid @enderror"  name="name">
            @if ($errors->has('name'))
                <div class="invalid-feedback">{{ $errors->first('name')}}</div>
            @endif
          </div>
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input value="{{ isset($findUsuario->email) ? $findUsuario->email : @old('email')}}" class="form-control @error('email') is-invalid @enderror"  name="email">
            @if ($errors->has('email'))
                <div class="invalid-feedback">{{ $errors->first('email')}}</div>
            @endif
          </div>
          <div class="mb-3">
            <label class="form-label">Nova Senha</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror"  name="password">
            @if ($errors->has('password'))
                <div class="invalid-feedback">{{ $errors->first('password')}}</div>
            @endif
          </div>
          <button type="submit" class="btn btn-success mt-2">Gravar</button>
  </form>    
@endsection