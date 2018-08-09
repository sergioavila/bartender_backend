<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
  protected $guarded = ['id'];
  public function recipe() {
    return $this->hasOne('App\Models\Recipe');
  }
}
