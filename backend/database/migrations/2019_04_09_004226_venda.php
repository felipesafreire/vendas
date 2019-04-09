<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Venda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vendedor_id')->unsigned();
            $table->dateTime('data_venda');
            $table->decimal('comissao','15','2');
            $table->decimal('valor_venda', '15','2');
        });


        Schema::table('vendas', function (Blueprint $table) {
            $table->foreign('vendedor_id')->references('id')->on('vendedores');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendas');
    }
}
