<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;



class Product extends Model
{
  use Searchable;

  public function toSearchableArray()


  {
  $record = $this->toArray();
    $record = [
      'product_name' => $this->product_name,
      'product_description' => $this->product_description,
    ];

    return $record;
  }


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
    return $this->belongsToMany('App\Color', 'product_colors')
      ->using('App\Pivots\Product_colors');
  }
  public function ProductCategories()
  {
    return $this->belongsToMany('App\Category', 'product_categories')
      ->using('App\Pivots\Product_categories');
  }
}
