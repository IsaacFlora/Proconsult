<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use Faker\Generator as Faker;

/* Factory para Assistencias */
$factory->define(App\Assistencia::class, function (Faker $faker) {

    static $aux = 2;

    $aux++;


    return [
        'user_id' => $aux,
        'statusaprovacao' => $faker->numberBetween(0,2),
        'statusfuncionamento' => $faker->numberBetween(0,1),
        'nome' => $faker->sentence($nbWords = 2, $variableNbWords = true),
        'nomeslug' => $faker->sentence($nbWords = 2, $variableNbWords = true),
        'cnpj' => $faker->numberBetween(12345646787654,22345646787654),
        'razaosocial' => $faker->sentence($nbWords = 2, $variableNbWords = true),
        'telefone' => $faker->e164PhoneNumber(),
        'email' => $faker->freeEmail(),
        'cep' => $faker->numberBetween(111111111,999999999),
        'cidade_id' => $faker->numberBetween(10,3000),
        'endereco' => $faker->address,
        'numero'=>$faker->numberBetween(100,3000),
        'bairro' => $faker->sentence($nbWords = 1, $variableNbWords = true)
    ];


});



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


/* Factory para Informações */
$factory->define(App\Info::class, function (Faker $faker) {
    return [
        'scriptshead' => '<script></script>',
        'scriptsfoot' => '<script></script>',
        'googlemaps' => '<script></script>',
        'facebook' => $faker->freeEmailDomain(),
        'instagram' => $faker->freeEmailDomain(),
        'twitter' => $faker->freeEmailDomain(),
        'youtube' => $faker->freeEmailDomain(),
        'telefone' => $faker->e164PhoneNumber(),
        'email' => $faker->freeEmail(),
        'endereco' => $faker->address()
        
    ];
});