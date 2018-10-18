<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Product_Tag;
use App\Product_Size;

class HomepageController extends Controller
{
  public function index() {
    $productspopular = Product::with('ProductSizing', 'ProductTag','ProductImages')
    ->orderBy('product_name', 'desc')
    ->take(4)
    ->get();
    $productslatest = Product::with('ProductSizing', 'ProductTag','ProductImages')
    ->orderBy('created_at', 'desc')
    ->take(4)
    ->get();
    return view('homepage')->with('productspopular', $productspopular)->with('productslatest',$productslatest);
  }

  public function show($id)
  {
    $product = Product::find($id);
    return view('description')->with('product', $product);
  }
}
