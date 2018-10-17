<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Tag extends Model
{
  public function Product()
{
  return $this->belongsTo('App\Product');
}
}
