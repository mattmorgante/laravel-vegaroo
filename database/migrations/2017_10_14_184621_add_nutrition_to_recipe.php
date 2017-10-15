<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNutritionToRecipe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('recipe', function (Blueprint $table) {
            $table->integer('protein')->default(0);
            $table->integer('carbs')->default(0);
            $table->integer('fat')->default(0);
            $table->integer('fiber')->default(0);
            $table->integer('sugar')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('recipe', function (Blueprint $table) {
            $table->dropColumn(['protein', 'carbs', 'fat', 'fiber', 'sugar']);
        });
    }
}
