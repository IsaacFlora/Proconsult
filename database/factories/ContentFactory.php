<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use Faker\Generator as Faker;





/* Factory para chamados*/
$factory->define(App\Chamado::class, function (Faker $faker) {


    return [
        
        'titulo'=>$faker->sentence($nbWords = 2, $variableNbWords = true),
        'user_cliente' => 1,
        'user_colaborador' => 2,
        'status' => $faker->numberBetween(0,2)

    ];


});


/* Factory para Mensagens chamado */
$factory->define(App\Mensagenschamado::class, function (Faker $faker) {


    return [
        'chamado_id'=>$faker->numberBetween(1,15),
        'user_remetente' => $faker->numberBetween(1,2),
        'texto' => $faker->paragraph($nbSentences = 7, $variableNbSentences = true),
        

    ];


});