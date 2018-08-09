<?php

namespace App\Http\Controllers;
use App\Models\Favorite;
use App\Models\Recipe;

class FavoritesController extends Controller
{
    /**
     * Create Favorite controller instance.
     *
     * @return void
     */
    function index()
    {
      $userId = 1;
      $favorites = Favorite::where('user_id', $userId)->pluck('recipe_id');
      $recipes = Recipe::whereIn('id', $favorites)->get();

      return response()->json($recipes);
    }

}