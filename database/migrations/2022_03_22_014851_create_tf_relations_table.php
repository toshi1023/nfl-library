<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTfRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tf_relations', function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->integer('season')->comment('シーズン');
            $table->integer('team_id')->comment('teamsのID');
            $table->integer('formation_id')->comment('formationsのID');
            $table->boolean('abstract_flg')->default(false)->comment('結合フラグ');     // pf_relationsとpositionsをabstract_categoryで結合するかどうかのフラグ
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
        Schema::dropIfExists('tf_relations');
    }
}
