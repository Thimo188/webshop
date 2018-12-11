<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;
use App\Product_Tag;
use App\Product_Size;
use App\Color;
use App\Product_Colors;

class IllustrationsController extends Controller
{
  public function index(Color $color)
  {
    $products = $color->product;
    $productsview = Product::with('ProductSizing', 'ProductTag','ProductImages')
    ->join('product_categories', 'products.id', '=' , 'product_categories.product_id')
    ->join('categories', 'categories.id' , '=' , 'product_categories.category_id')
    ->join('product_images', 'products.id', '=', 'product_images.product_id')
    ->where('product_categories.category_id' , '=', 2);
	if(!empty(session()->get('min-price'))) {
		$productsview = $productsview->where('price', '>=', session()->get('min-price'));
	}
	if(!empty(session()->get('max-price'))) {
		$productsview = $productsview->where('price', '<=', session()->get('max-price'));
	}
	$productsview = $productsview->paginate(9);
    $colors = Color::all();
    return view('illustrations', compact('products','productsview', 'colors'));
  }
  public function show($id)
  {
    $product = Product::find($id);
  }
}
