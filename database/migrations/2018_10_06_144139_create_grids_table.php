<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGridsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grids', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('multipliers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('grid_id');
            $table->integer('value');
            $table->timestamps();
        });

        Schema::create('multiplicands', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('grid_id');
            $table->integer('value');
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('grid_id');
            $table->unsignedInteger('multiplicand_id');
            $table->unsignedInteger('multiplier_id');
            $table->integer('value');
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
        Schema::dropIfExists('products');
        Schema::dropIfExists('multiplicands');
        Schema::dropIfExists('multipliers');
        Schema::dropIfExists('grids');
    }
}
