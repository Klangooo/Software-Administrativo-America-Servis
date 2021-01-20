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
            $table->decimal('latitudestringiniciar',8,6)->nullable();
            $table->decimal('longitudestringiniciar',9,7)->nullable();
            $table->decimal('latitudestringalmoco',8,6)->nullable();
            $table->decimal('longitudestringalmoco',9,7)->nullable();
            $table->decimal('latitudestringretorno',8,6)->nullable();
            $table->decimal('longitudestringretorno',9,7)->nullable();
            $table->decimal('latitudestringfim',8,6)->nullable();
            $table->decimal('longitudestringfim',9,7)->nullable();
            $table->string('timeStampstringiniciar')->nullable();
            $table->string('timeStampstringalmoco')->nullable();
            $table->string('timeStampstringretorno')->nullable();
            $table->string('timeStampstringfim')->nullable();
            $table->string('verificacaoiniciar')->nullable();
            $table->string('verificacaoalmoco')->nullable();
            $table->string('verificacaoretorno')->nullable();
            $table->string('verificacaofim')->nullable();
            $table->string('fimdajornada');
            $table->string('dia')->nullable();
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
