<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('transacoes', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('rifa_id');
            $table->integer('quantidade_cotas');
            $table->string('nome_completo');
            $table->string('email');
            $table->string('telefone');
            // Adicione outros campos conforme necessário
            $table->timestamps();


            $table->foreign('rifa_id')->references('id')->on('rifas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transacoes');
    }
};
