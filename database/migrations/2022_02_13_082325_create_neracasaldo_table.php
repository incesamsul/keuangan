<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNeracasaldoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('neracasaldo', function (Blueprint $table) {
            $table->integer('id_neracasaldo');
            $table->unsignedInteger('id_akun');
            $table->unsignedInteger('id_bukubesar');
            $table->integer('debit');
            $table->integer('kredit');
            $table->timestamps();

            // $table->foreign('id_akun')->references('id_akun')->on('akun')->onUpdate('cascade')->onDelete('cascade');
            // $table->foreign('id_bukubesar')->references('id_bukubesar')->on('bukubesar')->onUpdate('cascade')->onDelete('cascade');
        });
    }




    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('neracasaldo');
    }
}
