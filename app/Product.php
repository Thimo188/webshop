<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
  protected $fillable=['product_name', 'product_description', 'price'];
  public function ProductTag()
  {
    return $this->hasOne('App\Product_Tag');
  }
  public function ProductSizing()
  {
    return $this->hasOne('App\Product_Size');
  }
  public function ProductImages()
  {
    return $this->hasOne('App\Product_Image');
  }
  public function ProductPrice()
  {
    return $this->hasOne('App\Order_Detail');
  }
  public function ProductColors()
  {
        # mag veranderd worden, werkt miss niet
    return $this->hasOne('App\Product_Colors');
  }
}
