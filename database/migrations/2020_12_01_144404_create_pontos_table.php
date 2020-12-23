<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePontosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pontos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cpf');
            $table->string('entrada');
            $table->string('iniciointervalo')->nullable();
            $table->string('fimintervalo')->nullable();
            $table->string('saida')->nullable();
            $table->float('latitude0');
            $table->float('longitude0');
            $table->float('latitude1')->nullable();
            $table->float('longitude1')->nullable();
            $table->float('latitude2')->nullable();
            $table->float('longitude2')->nullable();
            $table->float('latitude3')->nullable();
            $table->float('longitude3')->nullable();
            $table->string('verificacao0');
            $table->string('verificacao1')->nullable();
            $table->string('verificacao2')->nullable();
            $table->string('verificacao3')->nullable();
            $table->string('data');
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
        Schema::dropIfExists('pontos');
    }
}
