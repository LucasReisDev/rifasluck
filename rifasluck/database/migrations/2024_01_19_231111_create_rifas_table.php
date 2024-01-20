<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRifasTable extends Migration
{
    public function up()
    {
        Schema::create('rifas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('descricao');
            $table->integer('cotas_disponiveis')->default(1000); // Defina o número inicial de cotas disponíveis
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rifas');
    }
};
