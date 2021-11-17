<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosfotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtosfotos', function (Blueprint $table) {
            $table->id();
            $table->string('fotos', 50);
            $table->string('legenda', 50);
            $table->unsignedBigInteger('produto_id', 50);
            $table->foreing('produto_id')->references;
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
        Schema::dropIfExists('produtosfotos');
    }
}
