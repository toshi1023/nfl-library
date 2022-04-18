<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStartersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('starters', function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->integer('season')->comment('シーズン');
            $table->boolean('odflg')->comment('攻守フラグ');   // true: Offence, false: Deffence
            $table->integer('roster_id')->comment('rostersのID');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('starters');
    }
}
