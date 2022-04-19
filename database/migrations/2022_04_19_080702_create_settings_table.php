<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->integer('user_id')->comment('usersのID');
            $table->integer('setting_id')->unsigned()->comment('設定の識別子');    // 1: シーズン選択を表示しない、2: チーム選択を表示しない...など
            $table->boolean('flg')->comment('設定のフラグ');
            $table->timestamps();

            // プライマリキー設定
            $table->unique(['user_id', 'setting_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
