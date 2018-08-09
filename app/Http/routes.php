<?php
use App\Models\Recipe;
use App\Models\Favorite;

$app->get('/', function () use ($app) {
    return 'Bartender APP';
});

//All Recipes
$app->get('/recipes', ['uses' => 'RecipesController@index']);

//Single Recipe
$app->get('/recipe/{id}', ['uses' => 'RecipesController@single']);

//Search Recipe
$app->get('/search', ['uses' => 'RecipesController@search']);

//All Categories
$app->get('/categories', ['uses' => 'CategoriesController@index']);

//Single Category
$app->get('/category/{id}', ['uses' => 'CategoriesController@single']);

//User favorites
$app->get('/favorites', ['uses' => 'FavoritesController@index']);
