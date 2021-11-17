<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendaprodutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendaprodutos', function (Blueprint $table) {
            $table->id();
            $table->string('quantidade', 15,2);
            $table->string('valor', 15,2);
            $table->unsignedBigInteger('produto_id');
            $table->unsignedBigInteger('venda_id');
            $table->foreign('venda_id')->on('id')->references('vendas');
            $table->foreign('produto_id')->on('id')->references('produto');

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
        Schema::dropIfExists('vendaprodutos');
    }
}
