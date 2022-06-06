<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoulRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foul_rules_tables', function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->string('english_name')->comment('英語表記');
            $table->string('japanese_name')->comment('日本語表記');
            $table->text('description')->comment('説明');
            $table->integer('status_type')->comment('攻守ステータス');                                      // 1: 攻撃, 2: 守備, 3: キック
            $table->integer('yard_info')->comment('罰則ヤード');
            $table->boolean('lossofdown_flg')->default(false)->comment('ダウンの喪失フラグ');
            $table->boolean('af_flg')->default(false)->comment('自動ファーストダウン更新フラグ');
            $table->boolean('clock_flg')->default(false)->comment('ゲーム クロックの減算フラグ');
            $table->boolean('exit_flg')->default(false)->comment('退場フラグ');

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
        Schema::dropIfExists('foul_rules_tables');
    }
}
