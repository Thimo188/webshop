<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  public function ProductTag()
{
  return $this->hasOne(Product_Tag::class);
}
public function ProductSizing()
{
return $this->hasOne(Product_Size::class);
}
}
