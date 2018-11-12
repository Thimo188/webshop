<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;
use App\Product_Tag;
use App\Product_Size;
use App\Colors;
use App\Product_Colors;

class ThreeDArtController extends Controller
{
  public function index() {
    $productsview = Product::with('ProductSizing', 'ProductTag','ProductImages')
    ->orderBy('created_at', 'desc')
    ->take(8)
    ->paginate(9);
    // $colorsview = Colors::with('ProductColors')
    // ->orderBy('name')
    // ->get();
    return view('3DArt')->with('productsview', $productsview);//->with('colorsview',$colorsview);
  }
  public function show($id)
  {
    $product = Product::find($id);
    return view('description')->with('product', $product);
  }
}
