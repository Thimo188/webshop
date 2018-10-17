<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  public function ProductTag()
{
  return $this->hasOne('App\Product_Tag');
}
}
