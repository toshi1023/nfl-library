<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePfRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pf_relations', function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->integer('formation_id')->comment('formationsのID');
            $table->integer('position_category')->comment('positionsのcategory');
            $table->integer('abstract_category')->comment('positionsのabstract_category');
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
        Schema::dropIfExists('pf_relations');
    }
}
