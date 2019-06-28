<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
  public function getCategoryName($id)
  {
    return Category::find($id)->pluck('name');
  }
}
