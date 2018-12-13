<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Categoria;

class AddCategorias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categorias', function (Blueprint $table) {
            Categoria::create(['nome' => 'Salário']);
            Categoria::create(['nome' => 'Pensão']);
            Categoria::create(['nome' => 'Moradia']);
            Categoria::create(['nome' => 'Alimentação']);
            Categoria::create(['nome' => 'Lazer']);
            Categoria::create(['nome' => 'Vestimenta']);
            Categoria::create(['nome' => 'Transporte']);
            Categoria::create(['nome' => 'Investimentos']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categorias', function (Blueprint $table) {
            //
        });
    }
}
