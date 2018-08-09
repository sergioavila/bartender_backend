<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
  protected $guarded = ['id'];
  //Relaciones
  public function category() {
    return $this->belongsTo('App\Models\Category');
  }
  public function image() {
    return $this->belongsTo('App\Models\Image');
  }
  public function ingredients() {
    return $this->belongsToMany('App\Models\Ingredient');
  }
}
