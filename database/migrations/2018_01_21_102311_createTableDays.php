<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDays extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('days', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->date('day');
            $table->integer('beans');
            $table->integer('greens');
            $table->integer('cruciferous');
            $table->integer('berries');
            $table->integer('fruits');
            $table->integer('vegetables');
            $table->integer('grains');
            $table->integer('flaxseeds');
            $table->integer('nuts');
            $table->integer('spices');
            $table->integer('water');
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
        Schema::dropIfExists('days');
    }
}
