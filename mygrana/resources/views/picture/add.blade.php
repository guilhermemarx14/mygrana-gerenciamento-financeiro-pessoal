@extends('layouts.mylayout')
@extends('perfil')

@section('titulo','Adicionar Gasto')
@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="w3-col m8">
      <div class="card">
        <div class="card-header w3-theme-l1">{{ __('Mudar imagem de Perfil') }}</div>

        <div class="card-body">

          {!! Form::open(array('url' => 'add', 'files'=>true)) !!}
          <div class="form-group custom-file ">
            <input type="file" class="custom-file-input" id="pic" name="pic" required>
            <label class="custom-file-label" for="pic">Fazer Upload do Arquivo</label>
          </div>
          <!--
          <div>
          <p>
          <label for="pic" class="col-md-4 col-form-label text-md-right">{{ __('Arquivo') }}</label>
          <input id="pic" type="file" class="form-control-file" name="pic" required autofocus>


        </p>

      </div>

      <div>
      {!! Form::submit('Add record') !!}
    </div>
  -->
  <hr class="w3-clear">
  <div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
      <button type="submit" class="btn btn-success">
        {{ __('Confirmar') }}
      </button>
    </div>
  </div>

</div>
</div>
</div>
</div>
</div>




@endsection

<!--<!DOCTYPE html>
<html>
<head>
<title>Add Image</title>
</head>
<body>
<h1>Add Image</h1>
{!! Form::open(array('url' => 'add', 'files'=>true)) !!}

<div>
{!! Form::label('user_id', 'User Id:') !!}
{!! Form::number('user_id') !!}
</div>
<div>
<p>
{!! Form::label('Chose the picture:') !!}
{!! Form::file('pic') !!}
</p>

</div>
<div>
{!! Form::submit('Add record') !!}
</div>
</body>
</html>-->
