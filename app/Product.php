<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;



class Product extends Model
{
  use Searchable;

  public function toSearchableArray()
  {
  $array = $this->toArray();

    $array = [
      'product_name' => $this->product_name,
      'product_description' => $this->product_description,
    ];

    return $array;
  }

  protected $fillable=['product_name', 'product_description', 'price'];
  public function ProductTag()
  {
    return $this->hasOne('App\Product_Tag');
  }
  public function ProductSizing()
  {
    return $this->hasOne(Product_Size::class);
  }
  public function ProductImages()
  {
    return $this->hasOne(Product_Image::class);
  }
  public function ProductPrice()
  {
    return $this->hasOne('App\Order_Detail');
  }
}
