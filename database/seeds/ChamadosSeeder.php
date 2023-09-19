<?php

use Illuminate\Database\Seeder;

class ChamadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        factory(App\Chamado::class, 15)->create();



    }
}
