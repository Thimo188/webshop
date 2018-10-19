<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class HomepageLatestController extends Controller
{
  public function index() {
    $productslol = Product::orderBy('product_name', 'desc')
    ->take(4)
    ->get();
    return view('homepage')->with('products', $productslol);
  }
}
