<?php

use Illuminate\Database\Seeder;
use App\Transacao;
use Faker\Factory as Faker;

class TransacoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transacoes')->truncate();
        $faker = Faker::create();

        foreach(range(1,2) as $i){

          $categoria = $i%8+1;
          if($categoria == 1 || $categoria == 2)
            $tipo = 0;
          else $tipo = 1;
          Transacao::create([
            'user_id' => '1',
            'descricao' => $faker->word(),
            'valor' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0.50 , $max = 1000),
            'tipo' => $tipo,
            'categoria_id' => $categoria,
            'data' => $faker->dateTimeBetween($startDate = '-47 months', $endDate = 'now', $timezone = null)
          ]);
        }

        foreach(range(1,10) as $i){
          $categoria = 1;
          if($categoria == 1 || $categoria == 2)
            $tipo = 0;
          else $tipo = 1;
          Transacao::create([
            'user_id' => '1',
            'descricao' => $faker->word(),
            'valor' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0.50 , $max = 300),
            'tipo' => $tipo,
            'categoria_id' => $categoria,
            'data' => $faker->dateTimeBetween($startDate = '-47 months', $endDate = 'now', $timezone = null)
          ]);
        }
        foreach(range(1,100) as $i){
          $categoria = $i%8+1;
          if($categoria == 1 || $categoria == 2)
            continue;
          else $tipo = 1;
          Transacao::create([
            'user_id' => '1',
            'descricao' => $faker->word(),
            'valor' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0.50 , $max = 20),
            'tipo' => $tipo,
            'categoria_id' => $categoria,
            'data' => $faker->dateTimeBetween($startDate = '-47 months', $endDate = 'now', $timezone = null)
          ]);
        }

    }
}
