@section('userName')
{{ $user->name }}
@endsection
@section('imgsrc')
<?php

if($user->fotos->isEmpty()){
  echo "/standarduser.png";

}
else{
  echo "/pic/" . $user->fotos->last()->id;
}
?>
@endsection

@section('Rendas')
<?php

  $renda = 0.0;

  foreach ($user->transacoes as $t) {
    if ($t->tipo == 0)
      $renda=$renda+$t->valor;
  }

  echo "R\$ " . number_format($renda,2,',','.');



 ?>
@endsection

@section('Gastos')
<?php
  $gasto = 0.0;

  foreach ($user->transacoes as $t) {
    if ($t->tipo == 1)
      $gasto=$gasto+$t->valor;
  }

  echo "R\$ " . number_format($gasto,2,',','.');
 ?>
@endsection

@section('LiquidoIcone')
<?php
  if($renda >= $gasto)
    echo "fa-thumbs-up";
  else echo "fa-thumbs-down";
 ?>
@endsection

@section('LiquidoCorIcone')
<?php
  if($renda >= $gasto)
    echo "w3-text-theme";
  else echo "w3-text-red";
 ?>
@endsection

@section('LiquidoCorValor')
<?php
  if($renda >= $gasto)
    echo "w3-text-theme";
  else echo "w3-text-red";
 ?>
@endsection

@section('LiquidoValor')
<?php
  if($renda >= $gasto)
    echo "R\$ " . number_format($renda-$gasto,2,',','.');
  else echo "R\$ " . number_format($gasto-$renda,2,',','.');

?>
@endsection
