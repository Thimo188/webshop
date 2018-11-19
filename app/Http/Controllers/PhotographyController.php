<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;
use App\Product_Tag;
use App\Product_Size;
use App\Color;
use DB;
class PhotographyController extends Controller
{

  public function index2(Request $request, Color $color) {

    if (!empty($request->search)) {
      $productsview=Product::searchproduct($request->search);
    }

    else {
      $productsview = Product::with('ProductSizing', 'ProductTag', 'ProductImages')
      ->orderBy('created_at', 'desc')
      ->take(8)
      ->paginate(9);
    }
    $colors = Color::all();

    return view('photography', compact('productsview', 'colors'));
  }
  # shows 9 items on the photography webpage ordered by Created_At
  public function index(Color $color)
  {

    $products = $color->product;
    $productsview = Product::with('ProductSizing', 'ProductTag','ProductImages')
    ->join('product_categories', 'products.id', '=' , 'product_categories.product_id')
    ->join('categories', 'categories.id' , '=' , 'product_categories.category_id')
    ->join('product_images', 'products.id', '=', 'product_images.product_id')
    ->where('product_categories.category_id' , '=', 1)
    ->paginate(9);
    $colors = Color::all();
    return view('photography', compact('products','productsview', 'colors'));
  }
  public function show($id)
  {
    $product = Product::find($id);
  }
}
