<?php

namespace App\Http\Controllers;
use App\Models\Recipe;
use App\Models\RecipeIngredient;
use App\Models\Ingredient;
use App\Models\Image;

class RecipesController extends Controller
{
    //Get All recipes
    function index()
    {
      return response()->json(Recipe::all());
    }
    //Single recipe
    function single($id)
    {
      $recipe = Recipe::find($id);
      $ingredients = $recipe->ingredients;
      $category = $recipe->category;
      $image = $recipe->image;
      return response()->json($ingredients);
    }
    //Search recipe
    function search($terms = 'amer')
    {
      $recipe = Recipe::where('name', 'LIKE' ,'%'.$terms.'%')->get();
      return response()->json($recipe);
    }

}
