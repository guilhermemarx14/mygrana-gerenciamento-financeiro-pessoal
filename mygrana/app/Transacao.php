<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transacao extends Model
{
    protected $fillable = [ 'user_id', 'valor', 'tipo', 'categoria_id', 'data' , 'descricao' ];
    protected $table = 'transacoes';

    public function user(){
      return $this->belongsTo('App\User');
    }

    public function categoria(){
      return $this->belongsTo('App\Categoria');
    }
}
