<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Recipe;

class CategoriesController extends Controller
{
    //All categories
    function index()
    {
      return response()->json(Category::all());
    }
    //Single category
    function single($id)
    {
      $recipes = Recipe::where('category_id', $id)->get();
      return response()->json($recipes);
    }

}
