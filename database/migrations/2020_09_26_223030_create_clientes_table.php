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
            $table->ID();

            $table->string('CNPJ');
            $table->string('Razão Social');
            
            $table->string('Nome Fantasia')->index()->onUpdate('cascade')->onDelete('cascade');
            $table->string('Endereço');
            $table->string('Email');
            $table->string('Telefone');
            $table->string('Nome do Responsável');
            $table->string('CPF');
            $table->string('Celular');
            
            
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
