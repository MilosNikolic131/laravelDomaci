<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KreirajTabeluRadniciPrvogNivoa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('podrska_prvog_nivoa', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('ime');
            $table->string('prezime');
            $table->string('korisnickoIme');
            $table->string('password');   
            $table->integer('id_nadredjenog')->unsigned();
            $table->foreign('id_nadredjenog')->references('id')->on('podrska_drugog_nivoa'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('podrska_prvog_nivoa');
    }
}
