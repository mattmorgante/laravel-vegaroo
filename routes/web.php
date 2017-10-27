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


Route::get('/calculator', function () {
    return view('calculator');
});

Route::get('/', 'recipes_controller@index');

Route::get('/recipes/{slug}', 'recipes_controller@show');
Route::get('/environmental-benefits', 'ArticlesController@environment');
Route::get('/health-benefits-short-term', 'ArticlesController@healthShortTerm');
Route::get('/health-benefits-long-term', 'ArticlesController@healthLongTerm');
Route::get('/stop-animal-cruelty', 'ArticlesController@animals');
Route::get('/vegan-on-a-budget', 'ArticlesController@budget');
Route::get('/pantry', 'ArticlesController@pantry');
Route::get('/values', 'ArticlesController@about');
