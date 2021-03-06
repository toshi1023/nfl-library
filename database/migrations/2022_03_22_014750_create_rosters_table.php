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
            $table->integer('number')->nullable()->comment('背番号');
            $table->integer('rating')->nullable()->comment('能力値');
            $table->integer('experience')->nullable()->comment('プロ経験年数');
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
