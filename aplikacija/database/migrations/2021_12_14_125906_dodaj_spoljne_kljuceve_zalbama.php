<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DodajSpoljneKljuceveZalbama extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('zalbe', function (Blueprint $table) {
            $table->integer('id_prvog_nivoa')->unsigned()->nullable();
            $table->integer('id_drugog_nivoa')->unsigned()->nullable();
            $table->foreign('id_prvog_nivoa')->references('id')->on('podrska_prvog_nivoa'); 
            $table->foreign('id_drugog_nivoa')->references('id')->on('podrska_drugog_nivoa'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('zalbe', function (Blueprint $table) {
            $table->dropForeign('id_prvog_nivoa');
            $table->dropForeign('id_drugog_nivoa');
        });
    }
}
