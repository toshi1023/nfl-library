<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRostersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rosters', function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->integer('season')->comment('シーズン');
            $table->integer('team_id')->comment('teamsのID');
            $table->integer('player_id')->comment('playersのID');
            $table->integer('position_id')->comment('positionsのID');
            $table->integer('number')->comment('背番号');
            $table->integer('rating')->comment('能力値');
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
        Schema::dropIfExists('rosters');
    }
}
