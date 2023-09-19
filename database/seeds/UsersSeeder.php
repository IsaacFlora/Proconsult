<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$usuarios = [

            [
		    	'role_id' =>2,
		        'name' => 'Cliente',
		        'email' => 'cliente@proconsult.com',
		        'password' => bcrypt('123'),
                'cpf'=>'337.457.708-54'
            ]
			
        ];

        DB::table('users')->insert($usuarios);



        factory(App\User::class, 1)->create();
    }
}
