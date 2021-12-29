<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KreirajTabeluZalbi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zalbe', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('tip_problema');
            $table->string('opis');
            $table->string('status');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zalbe');
    }
}
