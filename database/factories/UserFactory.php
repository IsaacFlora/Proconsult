<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {

    static $aux = 0;

    $aux++;

    $email='colaborador@proconsult.com';

    $nome= 'Isaac Colaborador';

    
    return [
    	'role_id' => 1,
        'name' => $nome,
        'email' => $email,
        'email_verified_at' => now(),
        'password' => bcrypt('123'),
        'remember_token' => Str::random(10),
        'cpf'=>'257.457.457-60'
    ];

});