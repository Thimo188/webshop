<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Tag extends Model
{
  public $table = 'product_tags';
  public function Product1()
{
  return $this->belongsTo(Product::class);
}
}
