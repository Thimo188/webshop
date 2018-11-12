<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Colors extends Model
{
    # mag veranderd worden, werkt miss niet
  public $table = 'product_colors';
  protected $primaryKey = 'id';
  public function ProductCol()
{
  return $this->belongsTo(Product::class);
  return $this->belongsTo(Colors::class);

}
}
