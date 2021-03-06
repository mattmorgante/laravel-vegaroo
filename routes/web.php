<?php
Route::get('/', 'LandingController@home');
Route::get('/vegan-recipes', 'RecipesController@index');
Route::get('/vegan-recipes/{category}/{slug?}', 'RecipesController@show');
Route::get('/6-easy-weeknight-vegan-dinner-recipes', 'RecipeGroupsController@weeknight');
Route::get('/5-vegan-recipes-with-plant-based-dairy-alternatives', 'RecipeGroupsController@dairySwap');
Route::get('/8-high-protein-vegan-recipes', 'RecipeGroupsController@highProtein');
Route::get('/6-vegan-recipes-perfect-for-leftovers', 'RecipeGroupsController@leftovers');
Route::get('/10-vegan-recipes-raw-food-diet', 'RecipeGroupsController@rawFood');
Route::get('/upvote', 'RecipeActionsController@upvote');
Route::get('/save-recipe', 'RecipeActionsController@save')->name('save_recipe')->middleware('auth');
Route::get('/unsave-recipe', 'RecipeActionsController@unsave')->name('save_recipe')->middleware('auth');
Route::get('/vegan-foods/{food?}', 'FoodsController@show');

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
Route::get('/tools', 'ToolsController@tools');
Route::get('/calculator', 'ToolsController@calculator');
Route::get('/blueprint', 'BlueprintController@index');

Route::get('/onboarding-quiz/save', 'OnboardingController@saveAnswerAjax')->middleware('auth');
Route::get('/onboarding-quiz/{hashed_id?}/{question_number?}', 'OnboardingController@findNextQuestion')->middleware('auth');
Route::get('/home/{date?}', 'HomeController@daily')->name('home')->middleware('auth');
Route::get('/weekly', 'HomeController@weekly')->name('weekly')->middleware('auth');
Route::get('/profile', 'HomeController@profile')->name('profile')->middleware('auth');
Route::get('/save', 'DashboardController@save')->name('save')->middleware('auth');
Route::get('/dashboard', 'LandingController@dashboard');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout' );
Auth::routes();