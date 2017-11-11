<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

//        $this->call('RecipeTableSeeder');
//        $this->command->info('Recipe table seeded!');

        $path = 'app/recipes.sql';
        DB::unprepared(file_get_contents($path));
        $this->command->info('Recipe table seeded!');
    }
}
