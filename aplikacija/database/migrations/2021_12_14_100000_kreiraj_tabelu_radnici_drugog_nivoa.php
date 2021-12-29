<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KreirajTabeluRadniciDrugogNivoa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('podrska_drugog_nivoa', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('ime');
            $table->string('prezime');
            $table->string('korisnickoIme');
            $table->string('password');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('podrska_drugog_nivoa');
    }
}
