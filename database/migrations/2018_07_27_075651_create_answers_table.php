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
            $table->integer('answer1');
            $table->integer('answer2');
            $table->integer('answer3');
            $table->integer('answer4');
            $table->integer('answer5');
            $table->string('answer6');
            $table->integer('answer7');
            $table->integer('answer8');
            $table->string('answer9');
            $table->string('answer10');
            $table->string('answer11');
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
