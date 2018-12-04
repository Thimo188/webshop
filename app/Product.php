<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\SoftDeletes;



class Product extends Model
{
  use Searchable;
  use SoftDeletes;
  protected $dates = ['deleted_at'];

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
  public static function searchproduct($product_name)
  {
	  return self::with('ProductSizing', 'ProductTag','ProductImages')
	  ->join('product_categories', 'products.id', '=' , 'product_categories.product_id')
	  ->join('categories', 'categories.id' , '=' , 'product_categories.category_id')
	  ->join('product_images', 'products.id', '=', 'product_images.product_id')
	  ->where('products.product_name', 'like', '%' . $product_name . '%')
	  ->paginate(15)->onEachSide(3);
  }
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

  public function ProductUser()
  {
    return $this->hasOne('App\User');
  }
  public function ProductColors()
  {
    return $this->belongsToMany('App\Color', 'product_colors')
      ->using('App\Pivots\Product_colors');
  }
  public function ProductColor()
  {
    return $this->hasOne('App\Product_Color');
  }
  public function ProductCategories()
  {
    return $this->belongsToMany('App\Category', 'product_categories')
      ->using('App\Pivots\Product_categories');
  }
  public function ProductCategory()
  {
    return $this->hasOne('App\Product_Category');
  }
}
