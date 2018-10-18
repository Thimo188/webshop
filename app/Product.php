<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $fillable=['product_name', 'product_description'];
  public function ProductTag()
  {
    return $this->hasOne('App\Product_Tag');
  }
  public function ProductSizing()
  {
    return $this->hasOne(Product_Size::class);
  }
}
