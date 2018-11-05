<?php

namespace App\Http\Controllers;
use App\Models\Recipe;
use App\Models\RecipeIngredient;
use App\Models\Category;
use App\Models\Ingredient;
use App\Models\Image;

class RecipesController extends Controller
{
    //Get All recipes
    function index()
    {
      $recipes = Recipe::with('ingredients')->get();
      $full_recipes = [];
      foreach ($recipes as $recipe) {
        $image = Image::select('url')->where('id', $recipe['image_id'])->first();
        $category = Category::select('name')->where('id', $recipe['category_id'])->first();
        $full_recipes[] = ['name'=>$recipe->name, 'description'=>$recipe->description,'image'=>$image->url,'category'=>$category->name];
      }
      return response()->json($full_recipes);
    }
    //Single recipe
    function single($id)
    {
      $recipe = Recipe::select('name','description','category_id','image_id')->where('id', $id)->first();
      $ingredients = Recipe::find($id)->ingredients->pluck('name');
      $category = Category::select('name')->where('id', $recipe['category_id'])->first();
      $image = Image::select('url')->where('id', $recipe['image_id'])->first();

      $full_recipe = collect(['name'=>$recipe->name, 'description'=>$recipe->description,['ingredients'=>$ingredients],'image'=>$image->url,'category'=>$category->name]);

      return response()->json($full_recipe);
    }
    //Search recipe
    function search($terms = 'amer')
    {
      $recipe = Recipe::where('name', 'LIKE' ,'%'.$terms.'%')->get();

      return response()->json($recipe);
    }

}
