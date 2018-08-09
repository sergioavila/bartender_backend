<?php
use App\Models\Recipe;
use App\Models\Favorite;

$app->get('/', function () use ($app) {
    // return $app->version();
});

//All Recipes
$app->get('/recipes', ['uses' => 'RecipesController@index']);

//Favorites
$app->get('/favorites', ['uses' => 'FavoritesController@index']);
