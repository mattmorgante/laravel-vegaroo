<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hashed_id');
            $table->integer('answer1')->nullable();
            $table->integer('answer2')->nullable();
            $table->integer('answer3')->nullable();
            $table->integer('answer4')->nullable();
            $table->integer('answer5')->nullable();
            $table->string('answer6')->nullable();
            $table->integer('answer7')->nullable();
            $table->integer('answer8')->nullable();
            $table->string('answer9')->nullable();
            $table->string('answer10')->nullable();
            $table->string('answer11')->nullable();
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
        Schema::dropIfExists('answers');
    }
}
