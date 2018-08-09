<?php

namespace App\Http\Controllers;

class RecipesController extends Controller
{
    /**
     * Create Recipes controller instance.
     *
     * @return void
     */
    function index()
    {
      return response()->json(['juan','pedri']);
      // return response()->json(['name' => 'Abigail', 'state' => 'CA']);
    }

    //
}
