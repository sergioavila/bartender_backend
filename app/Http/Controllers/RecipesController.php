<?php

namespace App\Http\Controllers;
use App\Models\Recipe;

class RecipesController extends Controller
{
    /**
     * Create Recipes controller instance.
     *
     * @return void
     */
    function index()
    {
      // return response()->json(['juan','pedri']);
      return response()->json(Recipe::all());
    }

    //
}
