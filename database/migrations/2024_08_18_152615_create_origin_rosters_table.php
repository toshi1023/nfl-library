<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOriginRostersTable extends Migration
{
    /**
     * スクレイピングで取得したロスター情報を格納
     *
     * @return void
     */
    public function up()
    {
        Schema::create('origin_rosters', function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->integer('season')->comment('シーズン');
            $table->integer('team_id')->comment('teamsのID');
            $table->string('firstname')->nullable()->comment('名前');
            $table->string('lastname')->nullable()->comment('苗字');
            $table->string('birthday')->nullable()->comment('生年月日');
            $table->double('height', 5, 1)->nullable()->comment('身長');
            $table->double('weight', 5, 1)->nullable()->comment('体重');
            $table->string('college')->nullable()->comment('大学');
            $table->string('drafted_team')->nullable()->comment('ドラフトチーム');
            $table->string('drafted_round')->nullable()->comment('ドラフト巡回数');
            $table->string('drafted_rank')->nullable()->comment('ドラフト全体順位');
            $table->integer('drafted_year')->nullable()->comment('ドラフト年');
            $table->string('position_name')->comment('名前');
            $table->integer('number')->nullable()->comment('背番号');
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
        Schema::dropIfExists('origin_rosters');
    }
}
