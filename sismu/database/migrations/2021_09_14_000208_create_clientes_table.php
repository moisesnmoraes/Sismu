<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->string('endereco', 150);
            $table->string('numero', 10);
            $table->string('bairro', 100);
            $table->string('cpf', 20);
            $table->string('telefone', 20);
            $table->string('celular', 20);
            $table->string('cep', 10);
            $table->unsignedBigInteger('cidade_id');
            $table->foreign('cidade_id')->on('cidades')->references('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
