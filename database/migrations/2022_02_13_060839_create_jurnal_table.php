<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJurnalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('jurnal', function (Blueprint $table) {
            $table->increments('id_jurnal');
            // $table->unsignedInteger('id_akun');
            // $table->unsignedInteger('id_pemasok'); 
            $table->unsignedInteger('id_akun');
            $table->integer('id_pemasok')->nullable();
            $table->integer('id_pelanggan')->nullable();
            $table->date('tgl_transaksi');
            $table->integer('debit');
            $table->integer('kredit');
            $table->integer('total_debit');
            $table->integer('total_kredit');
            $table->string('file',250); 
            $table->timestamps();
            
            // $table->foreign('id_pemasok')->references('id_pemasok')->on('pemasok')->onUpdate('cascade')->onDelete('cascade');
            // $table->foreign('id_pelanggan')->references('id_pelanggan')->on('pelanggan')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_akun')->references('id_akun')->on('akun')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jurnal');
    }
}
