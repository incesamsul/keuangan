<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukubesarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bukubesar', function (Blueprint $table) {
            $table->increments('id_bukubesar');
            $table->unsignedInteger('id_akun');
            $table->unsignedInteger('id_jurnal');
            $table->integer('saldo');
            $table->integer('total_debit');
            $table->integer('total_kredit');
            $table->timestamps();

            $table->foreign('id_akun')->references('id_akun')->on('akun')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_jurnal')->references('id_jurnal')->on('jurnal')->onUpdate('cascade')->onDelete('cascade');
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bukubesar');
    }
}
