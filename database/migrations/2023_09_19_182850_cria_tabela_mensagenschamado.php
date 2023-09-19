<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriaTabelaMensagenschamado extends Migration
{
    

    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'mensagenschamados';


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
            $table->unsignedBigInteger('chamado_id')->nullable()->comment('Chamado da mensagem');
            $table->unsignedBigInteger('user_remetente')->nullable()->comment('Usuario que respondeu');
            $table->text('texto');

            $table->nullableTimestamps();

            $table->foreign('user_remetente')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');

            $table->foreign('chamado_id')->references('id')->on('chamados')->onUpdate('NO ACTION')->onDelete('NO ACTION');


        });

        DB::statement("ALTER TABLE ".$this->tableName." COMMENT = 'Tabela que armazena as mensagens de um chamdo do sistema'");

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
