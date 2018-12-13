@extends('layouts.mylayout')
@extends('perfil')

@section('titulo','MyGrana HomePage')

@section('content')
<?php
$total = 0.00;
$porcategoria = array();
$porcategoria[0] = 0.0;
foreach($categorias as $c)
{
  $porcategoria[$c->id] = 0.00;
}
foreach ($user->transacoes as $t) {
  if ($t->categoria_id == 1 || $t->categoria_id == 2) $total = $total+$t->valor; else $total = $total - $t->valor;
  $porcategoria[$t->categoria_id] = $porcategoria[$t->categoria_id] + $t->valor;
}


 ?>
<div class="w3-col m9 w3-right">


  <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
    <h4><strong>Total por categorias</strong></h4><br>
    <hr class="w3-clear">
    <table id="filtroCategoria" class="w3-table-all">
      <thead>
        <tr class="w3-theme-l1">
          <th><strong>Categoria</strong></th>
          <th><strong>Total</strong></th>
        </tr>
      </thead>

      <tbody>
        @foreach($categorias as $c)
          <tr>
            <td>{{ $c->nome }}</td>
            <td><strong class="<?php if ($c->id == 1 || $c->id == 2) echo "w3-text-theme"; else echo "w3-text-red"; ?>">{{ "R\$ " . number_format($porcategoria[$c->id],2,',','.') }}<strong></td>
          </tr>
        @endforeach
        <tr>
          <td><strong>Total</strong></td>
          <td><strong class="<?php if ($total>=0) echo "w3-text-theme"; else{ $total = -$total; echo "w3-text-red"; }?>">{{ "R\$ " . number_format($total,2,',','.') }}<strong></td>
        </tr>
      </tbody>


    </table>
            <hr class="w3-clear">


    </div>

    <!-- End Middle Column -->
  </div>


  @endsection
