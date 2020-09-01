<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUrunOzellikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urun-ozellik', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('urun_id')->unsigned();
            $table->integer('ozellik_id')->unsigned();
            $table->string('ozellik_deger');
            $table->foreign('ozellik_id')->references('id')->on('ozellik')->onDelete('cascade');
            $table->foreign('urun_id')->references('id')->on('urun')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('urun-ozellik');
    }
}
