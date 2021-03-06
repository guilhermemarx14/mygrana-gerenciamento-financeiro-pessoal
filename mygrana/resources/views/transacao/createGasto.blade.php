@extends('layouts.mylayout')
@extends('perfil')

@section('titulo','Adicionar Gasto')
@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="w3-col m8">
      <div class="card">
        <div class="card-header w3-theme-l1">{{ __('Inserção de Gastos') }}</div>

        <div class="card-body">
          <form method="POST" action="{{ route('transacao.store','gasto') }}">
            @csrf

            <div class="form-group row">
              <label for="descricao" class="col-md-4 col-form-label text-md-right">{{ __('Descrição') }}</label>

              <div class="col-md-6">
                <input id="descricao" type="text" class="form-control" name="descricao" required autofocus>
              </div>
            </div>

            <div class="form-group row">
              <label for="valor" class="col-md-4 col-form-label text-md-right">{{ __('Valor') }}</label>

              <div class="col-md-6">
                <input id="valor" type="number" step="0.01" min="0" class="form-control" name="valor" required autofocus>
              </div>
            </div>

            <div class="form-group row">
              <label for="categoria" class="col-md-4 col-form-label text-md-right">{{ __('Categoria') }}</label>

              <div class="col-md-6">
                <select id="categoria_id" class="form-control" name="categoria_id" required>

                  @foreach($categorias as $c)
                  @if($c->id == 1 || $c->id == 2)

                  @else
                  <option value="{{ $c->id }}">{{ $c->nome }}</option>
                  @endif

                  @endforeach

                </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="data" class="col-md-4 col-form-label text-md-right">{{ __('Data') }}</label>

              <div class="col-md-6">
                <input id="data" class="form-control" type="date" name="data" value="<?php echo date("Y-m-d");?>" required>
              </div>
            </div>
            <hr class="w3-clear">
            <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-success">
                  {{ __('Confirmar') }}
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
