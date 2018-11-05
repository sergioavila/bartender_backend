<?php

namespace App\Http\Controllers;
use App\Models\Favorite;
use App\Models\Recipe;
use App\Models\Image;
use App\Models\Category;

class FavoritesController extends Controller
{
    //Get user favorites
    function index($user_id = null)
    {
      $favorites = Favorite::where('user_id', $user_id)->pluck('recipe_id');
      $recipes = Recipe::whereIn('id', $favorites)->get();
      $full_recipes = [];

      foreach ($recipes as $recipe) {
        $image = Image::select('url')->where('id', $recipe['image_id'])->first();
        $category = Category::select('name')->where('id', $recipe['category_id'])->first();
        $full_recipes[] = ['id'=>$recipe->id, 'name'=>$recipe->name, 'description'=>$recipe->description,'image'=>$image->url,'category'=>$category->name];
      }

      return response()->json($full_recipes);
    }
    //Add favorite
    function add_remove($user_id = null, $recipe_id = null)
    {
      $favorite = Favorite::where('user_id',$user_id)->where('recipe_id',$recipe_id)->first();

      if (!$favorite) {
        $favorite = new Favorite;
        $favorite->user_id    = $user_id;
        $favorite->recipe_id  = $recipe_id;
        $favorite->save();
      }
      else{
        $favorite->delete();
        $favorite = '';
      }

      return response()->json($favorite);
    }

}
