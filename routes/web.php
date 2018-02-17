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


Route::get('/', 'LandingController@home');

// recipes
Route::get('/vegan-recipes', 'recipes_controller@home');
Route::get('/vegan-recipes/{category}/{slug?}', 'recipes_controller@show');
Route::get('/vegan-foods/{food?}', 'FoodsController@show');


// resources
Route::get('/resources', 'ArticlesController@index');
Route::get('/environmental-benefits', 'ArticlesController@environment');
Route::get('/health-benefits-long-term', 'ArticlesController@healthLongTerm');
Route::get('/stop-animal-cruelty', 'ArticlesController@animals');
Route::get('/vegan-on-a-budget', 'ArticlesController@budget');
Route::get('/pantry', 'ArticlesController@pantry');
Route::get('/values', 'ArticlesController@about');
Route::get('/nutrition', 'ArticlesController@nutrition');
Route::get('/small-steps', 'ArticlesController@smallSteps');
Route::get('/blogs-books-documentaries', 'ArticlesController@blogs');
Route::get('/celebrities', 'ArticlesController@celebrities');
Route::get('/calculator', function () {
    return view('calculator');
});

// tools & user
Route::get('/blueprint', 'recipes_controller@blueprint');
Route::post('/addEmail', 'EmailController@create');
Route::get('/upvote', 'recipes_controller@upvote');
Route::get('/save-recipe', 'recipes_controller@save')->name('save_recipe')->middleware('auth');

Route::get('/weekly', 'HomeController@weekly')->name('weekly')->middleware('auth');
Route::get('/profile', 'HomeController@welcome')->name('welcome')->middleware('auth');
Route::get('/home/{date?}', 'HomeController@userIndex')->name('home')->middleware('auth');
Route::get('/save', 'HomeController@save')->name('save')->middleware('auth');



Route::get('/logout', 'Auth\LoginController@logout')->name('logout' );
Auth::routes();
