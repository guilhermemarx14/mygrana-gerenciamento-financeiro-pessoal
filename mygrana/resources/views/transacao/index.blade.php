@extends('layouts.mylayout')
@extends('perfil')

@section('titulo','Listagem')

@section('content')
<?php
$total = 0.00;
?>
<div class="w3-col m9 w3-right">


  <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
    <h4><strong>Lista de Gastos e Rendas</strong></h4><br>

    <form method="get" action="{{ route('indexfiltrado') }}">
      <div class="form-group row">
        <label for="mes" class="col-md-4 col-form-label text-md-right">{{ __('Mês') }}</label>
        <div class="col-md-6">
            <select id="mes" class="form-control" name="mes" required>
              <option <?php if($filtromes=='0') echo "selected";?> value="0">Sem Filtro</option>
            @foreach(range(1,12) as $i)
                <option <?php if(intval($filtromes)==$i) echo "selected"?> value="{{ $i }}">{{ $meses[$i] }}</option>
            @endforeach

          </select>
        </div>

      </div>
      <div class="form-group row">
        <label for="ano" class="col-md-4 col-form-label text-md-right">{{ __('Ano') }}</label>
        <div class="col-md-6">
            <select id="ano" class="form-control" name="ano" required>
              <option <?php if($filtroano=='0') echo "selected";?> value="0">Sem Filtro</option>
            @foreach(range(2015,2018) as $i)
                <option <?php if(intval($filtroano)==$i) echo "selected"?> value="{{ $i }}">{{ $i }}</option>
            @endforeach

          </select>
        </div>

      </div>
      <div class="form-group row">
        <label for="categoria" class="col-md-4 col-form-label text-md-right">{{ __('Categoria') }}</label>
        <div class="col-md-6">
            <select id="categoria" class="form-control" name="categoria" required>
              <option <?php if($filtrocategoria=='0') echo "selected";?> value="0">Sem Filtro</option>
            @foreach($categorias as $c)
                <option <?php if(intval($filtrocategoria)==$c->id) echo "selected"?> value="{{ $c->id}}">{{ $c->nome }}</option>
            @endforeach

          </select>
        </div>

      </div>

      <div class="form-group row mb-0">
          <div class="col-md-6 offset-md-4">
              <button type="submit" class="btn btn-success">
                  {{ __('Filtrar') }}
              </button>
          </div>
      </div>
    </form>



    <hr class="w3-clear">
    <table class="w3-table-all">
      <thead>
        <tr class="w3-theme-l1">
          <th><strong>Descrição</strong></th>
          <th><strong>Data</strong></th>
          <th><strong>Categoria</strong></th>
          <th><strong>Valor</strong></th>
          <th><strong>Ações</strong></th>
          <th></th>

        </tr>
      </thead>

      <tbody>
        @foreach($transacoes as $t)
        <tr>
          <td>{{ $t->descricao }}</td>
          <td><?php echo date('d/m/Y',strtotime($t->data)) ?></td>
          <td>{{ $t->categoria->nome }}</td>

          <td><strong class="<?php
          if ($t->categoria_id == 1 || $t->categoria_id == 2){
            echo "w3-text-theme";
          }else{
            echo "w3-text-red";
          }?>">{{ "R\$ " . number_format($t->valor,2,',','.') }}<strong>
          </td>

          <td>
            <form action="{{ route('transacao.edit', $t->id) }}" >
              <Button class="btn btn-warning" id="edit" type="submit" name="edit" value="edit" >Editar</Button>
            </form>
          </td>

          <td>
            <form method="post" action="{{ route('transacao.destroy', $t->id) }}" >
              @csrf
              @method('DELETE')
              <Button class="btn btn-danger" id="edit" type="submit" name="destroy" value="destroy" >Excluir</Button>
            </form>

          </td>
        </tr>
        @endforeach

      </tbody>


    </table>

        <hr class="w3-clear">
    </div>

    <!-- End Middle Column -->
  </div>


  @endsection
