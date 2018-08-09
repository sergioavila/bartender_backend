<?php

namespace App\Http\Controllers;
use App\Models\Recipe;

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
      $recipe = Recipe::where('id', $id)->get();
      return response()->json($recipe);
    }
    //Search recipe
    function search($terms = 'amer')
    {
      $recipe = Recipe::where('name', 'LIKE' ,'%'.$terms.'%')->get();
      return response()->json($recipe);
    }

}
