<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;
use App\Product_Tag;
use App\Product_Size;
class PhotographyController extends Controller
{
  public function index() {
    $productspopular = Product::with('ProductSizing', 'ProductTag','ProductImages')
    ->orderBy('created_at', 'desc')
    ->take(8)
    ->paginate(9);
    return view('photography')->with('productspopular', $productspopular);
  }
  public function show($id)
  {
    $product = Product::find($id);
    return view('description')->with('product', $product);
  }
}
