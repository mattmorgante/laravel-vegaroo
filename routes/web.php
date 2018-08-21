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
Route::get('/dashboard', 'LandingController@dashboard');
// recipes
Route::get('/vegan-recipes', 'RecipesController@home');
Route::get('/vegan-recipes/{category}/{slug?}', 'RecipesController@show');
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

Route::get('/vegan-quiz', 'QuizController@index');
Route::get('/vegan-quiz/save', 'QuizController@saveAnswer');
Route::get('/vegan-quiz/{hashed_id}/{number}', 'QuizController@takeQuiz');
Route::get('/suggestions/email/{hashed_id}', 'QuizController@emailCapture')->name('email-capture');
Route::get('/suggestions/saveEmail', 'QuizController@saveEmail');
Route::get('/display-suggestions/{hashed_id}', 'QuizController@suggestions');

// tools & user
Route::get('/tools', 'LandingController@tools');
Route::get('/blueprint', 'RecipesController@blueprint');
Route::post('/addEmail', 'EmailController@create');
Route::get('/upvote', 'RecipesController@upvote');
Route::get('/save-recipe', 'RecipesController@save')->name('save_recipe')->middleware('auth');
Route::get('/unsave-recipe', 'RecipesController@unsave')->name('save_recipe')->middleware('auth');

Route::get('/weekly', 'HomeController@weekly')->name('weekly')->middleware('auth');
Route::get('/profile', 'HomeController@welcome')->name('welcome')->middleware('auth');
Route::get('/home/{date?}', 'HomeController@userIndex')->name('home')->middleware('auth');
Route::get('/save', 'HomeController@save')->name('save')->middleware('auth');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout' );
Auth::routes();
