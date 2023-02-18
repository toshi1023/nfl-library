<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->string('city')->comment('拠点名');                                          // 例) SanFrancisco
            $table->string('name')->comment('チーム名');                                        // 例) 49ers
            $table->tinyInteger('conference')->default(1)->comment('所属カンファレンス');         // 例) NFC or AFC
            $table->tinyInteger('area')->default(1)->comment('所属地区');                       // 例) 北地区 or 東地区 or 南地区 or 西地区
            $table->string('image_file')->nullable()->comment('画像名');                        // サムネ画像
            $table->string('back_image_file')->nullable()->comment('背景用画像名');              // 背景用画像
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
        Schema::dropIfExists('teams');
    }
}
