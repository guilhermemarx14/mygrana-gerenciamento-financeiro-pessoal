<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
      protected $fillable = [ 'nome' ];



      public function transacoes(){
        return $this->hasMany('App\Transacao');
      }
}
