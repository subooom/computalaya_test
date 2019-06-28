<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
  public function getCategoryName($id)
  {
    return Category::find($id)->name;
  }

  public function category()
  {
    return $this->belongsTo(Category::class);
  }
}
