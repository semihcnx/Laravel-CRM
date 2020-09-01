<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMusteri extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('musteri', function (Blueprint $table) {
            $table->increments('id');
            $table->string('adsoyad',60);
            $table->string('tcno',11)->nullable();
            $table->string('telefon',15);
            $table->string('ceptelefonu',15)->nullable();
            $table->string('il',30);
            $table->string('ilce',30);
            $table->string('adres',200)->nullable();
            $table->string('email',150)->nullable();
            $table->string('resim',50)->nullable();
            $table->string('googlemaps',200)->nullable();
            $table->timestamp('olusturma_tarihi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('guncelleme_tarihi')->default(DB::raw('CURRENT_TIMESTAMP on UPDATE CURRENT_TIMESTAMP'));
            // $table->softDeletes();
            $table->timestamp('silinme_tarihi')->nullable();



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('musteri');
    }
}
