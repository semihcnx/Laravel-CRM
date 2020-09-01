<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKategoriOzellikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ozellik-kategori', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ozellik_id')->unsigned();
            $table->integer('kategori_id')->unsigned();
            $table->foreign('ozellik_id')->references('id')->on('ozellik')->onDelete('cascade');
            $table->foreign('kategori_id')->references('id')->on('kategori')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ozellik-kategori');
    }
}
