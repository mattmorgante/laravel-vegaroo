<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/recipes', 'recipes_controller@index');

Route::get('/recipes/{slug}', 'recipes_controller@show');

Route::get('/pantry', 'recipes_controller@pantry');

Route::get('/environmental-benefits', 'ArticlesController@environment');

Route::get('/health-benefits', 'ArticlesController@health');

Route::get('/vegan-on-a-budget', 'ArticlesController@budget');

Route::get('/stop-animal-cruelty', 'ArticlesController@animals');