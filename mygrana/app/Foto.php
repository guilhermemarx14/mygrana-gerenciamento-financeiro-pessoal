<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
  protected $fillable = [
'pic', 'user_id'
];

public function user(){
  return $this->belongsTo('App\User');
}
}
