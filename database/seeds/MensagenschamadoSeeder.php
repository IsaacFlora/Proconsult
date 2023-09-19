<?php

use Illuminate\Database\Seeder;

class MensagenschamadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        factory(App\Mensagenschamado::class, 45)->create();



    }
}
