<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transacoes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->float('valor');
            $table->string('descricao');
            $table->tinyInteger('tipo');//tipo1 para gasto e tipo0 para renda
            $table->unsignedInteger('categoria_id');
            $table->date('data');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('categoria_id')->references('id')->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transacoes');
    }
}
