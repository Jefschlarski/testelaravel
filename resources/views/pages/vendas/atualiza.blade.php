

@extends('index')
@section('content')
<form method="POST" action="{{route('atualizar.cliente', $findCliente->id)}}">
    @csrf
    @method('PUT')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 >Editar Cliente</h1>
        </div>
        <div class="mb-3">

          <label class="form-label">Nome</label>
          <input type="text" value="{{ isset($findCliente->nome) ? $findCliente->nome : @old('nome')}}" class="form-control @error('nome') is-invalid @enderror"  name="nome">
          @if ($errors->has('nome'))
              <div class="invalid-feedback">{{ $errors->first('nome')}}</div>
          @endif

        </div>

        <div class="mb-3">

          <label class="form-label">Email</label>
          <input type="text" value="{{ isset($findCliente->email) ? $findCliente->email : @old('email')}}" class="form-control @error('email') is-invalid @enderror"  name="email">
          @if ($errors->has('email'))
              <div class="invalid-feedback">{{ $errors->first('email')}}</div>
          @endif

        </div>

        <div class="mb-3">

          <label class="form-label">CEP</label>
          <input id="cep" type="text" value="{{ isset($findCliente->cep) ? $findCliente->cep : @old('cep')}}" class="form-control @error('cep') is-invalid @enderror"  name="cep">
          @if ($errors->has('cep'))
              <div class="invalid-feedback">{{ $errors->first('cep')}}</div>
          @endif

        </div>

        <div class="mb-3">

          <label class="form-label">Endereço</label>
          <input id="endereco" type="text" value="{{ isset($findCliente->endereco) ? $findCliente->endereco : @old('endereco')}}" class="form-control @error('endereco') is-invalid @enderror"  name="endereco">
          @if ($errors->has('endereco'))
              <div class="invalid-feedback">{{ $errors->first('endereco')}}</div>
          @endif

        </div>

        <div class="mb-3">

          <label class="form-label">Logradouro</label>
          <input id="logradouro" type="text" value="{{ isset($findCliente->logradouro) ? $findCliente->logradouro : @old('logradouro')}}" class="form-control @error('logradouro') is-invalid @enderror"  name="logradouro">
          @if ($errors->has('logradouro'))
              <div class="invalid-feedback">{{ $errors->first('logradouro')}}</div>
          @endif

        </div>

        <div class="mb-3">

          <label class="form-label">Bairro</label>
          <input id="bairro" type="text" value="{{ isset($findCliente->bairro) ? $findCliente->bairro : @old('bairro')}}" class="form-control @error('bairro') is-invalid @enderror"  name="bairro">
          @if ($errors->has('bairro'))
              <div class="invalid-feedback">{{ $errors->first('bairro')}}</div>
          @endif

        </div>
          <button type="submit" class="btn btn-success mt-2">Gravar</button>
  </form>    
@endsection
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>


<script>
  $(document).ready(function(){
    $("#cep").blur(function () {
    var cep = $(this).val().replace(/\D/g, '');
    if (cep != "") {
        var validacep = /^[0-9]{8}$/;
        if (validacep.test(cep)) {
            $("#logradouro").val(" ");
            $("#bairro").val(" ");
            $("#endereco").val(" ");
            $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {
                if (!("erro" in dados)) {
                    $("#logradouro").val(dados.logradouro.toUpperCase());
                    $("#bairro").val(dados.bairro.toUpperCase());
                    $("#endereco").val(dados.localidade.toUpperCase());
                }
                else {
                    alert("CEP não encontrado de forma automatizado digite manualmente ou tente novamente.");
                }
            });
        }
    }
});
});
</script>