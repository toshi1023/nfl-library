<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->string('firstname')->comment('名前');
            $table->string('lastname')->comment('苗字');
            $table->string('birthday')->comment('生年月日');
            $table->double('height', 5, 1)->nullable()->comment('身長');
            $table->double('weight', 5, 1)->nullable()->comment('体重');
            $table->string('college')->nullable()->comment('大学');
            $table->string('drafted_team')->nullable()->comment('ドラフトチーム');
            $table->string('drafted_round')->nullable()->comment('ドラフト巡回数');
            $table->string('drafted_rank')->nullable()->comment('ドラフト全体順位');
            $table->integer('drafted_year')->nullable()->comment('ドラフト年');
            $table->string('image_file')->nullable()->comment('画像名');
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
        Schema::dropIfExists('players');
    }
}
