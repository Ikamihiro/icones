<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIconesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('icones', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('nacionalidade');
            $table->date('data_nascimento');
            $table->string('local_nascimento');
            $table->date('data_falecimento')->nullable();
            $table->string('local_falecimento')->nullable();
            $table->longText('contribuicao');
            $table->string('foto_path');
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
        Schema::dropIfExists('icones');
    }
}
