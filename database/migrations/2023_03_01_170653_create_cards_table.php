<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer("user_id");
            $table->string("name");
            $table->string("scientific_name");
            $table->enum("habitat_type", ["single", "multi"]);
            $table->string("food_count");
            $table->integer("points");
            $table->enum("nest_type", ["platform", "bowl", "cavity", "ground", "star"]);
            $table->integer("egg_count");
            $table->integer("wingspan");
            $table->enum("habitat_continent_type", ["single", "multi"]);
            $table->enum("power_type", ["When Activated", "Once Between Turns", "When Played"]);
            $table->text("power");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cards');
    }
}
