<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriaTabelaChamados extends Migration
{


    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'chamados';


    /**
     * Run the migrations.
     * @table users
     *
     * @return void
     */
    public function up()
    {

        Schema::create($this->tableName, function (Blueprint $table) {
            
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';

            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_cliente')->nullable()->comment('Cliente vinculado ao chamado');
            $table->unsignedBigInteger('user_colaborador')->nullable()->comment('Colaborador vinculado ao chamado');
            $table->tinyinteger('status')->default(0)->comment('0 => Abarto, 1 => Em atendimento', '2 => Fechado');
            $table->string('titulo');
            
            $table->nullableTimestamps();

            $table->foreign('user_cliente')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');

            $table->foreign('user_colaborador')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');


        });

        DB::statement("ALTER TABLE ".$this->tableName." COMMENT = 'Tabela que armazena os chamados do sistema'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists($this->tableName);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
     }


}
