<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Product_Tag;
use App\Product_Size;

class PhotographyController extends Controller
{
  public function index() {
    $productspopular = Product::with('ProductSizing', 'ProductTag')
    ->orderBy('product_name', 'desc')
    ->take(8)
    ->get();
    return view('photography')->with('productspopular', $productspopular);
  }

  public function show($id)
  {
    $product = Product::find($id);
    return view('description')->with('product', $product);
  }
}
