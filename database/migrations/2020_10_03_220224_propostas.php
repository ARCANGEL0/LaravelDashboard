<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Propostas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propostas', function (Blueprint $table) {
            $table->id();
            $table->string('Cliente');
            $table->foreign('Cliente')->references('Nome Fantasia')->on('clientes')->onDelete('cascade')->onUpdate('cascade');
            $table->string('Endereço da obra');
            $table->bigInteger('Valor Total');
            $table->bigInteger('Quantidade de parcelas');
            $table->bigInteger('Valor das parcelas');
            $table->date('Data de início do pagamento');
            $table->smallInteger('Dia das parcelas');
            $table->string('Status');

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
        Schema::dropIfExists('propostas');
    }
}
