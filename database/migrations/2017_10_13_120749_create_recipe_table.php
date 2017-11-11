<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipe', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->float('cost');
            $table->time('time');
            $table->string('description');
            $table->string('ingredients');
            $table->string('instructions');
            $table->timestamps();
            $table->string('category');
            $table->integer('calories');
            $table->integer('protein');
            $table->integer('carbs');
            $table->integer('fat');
            $table->integer('fiber');
            $table->integer('sugar');
            $table->string('img');
            $table->integer('score');
            $table->string('notes', 1000);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipe');
    }
}
