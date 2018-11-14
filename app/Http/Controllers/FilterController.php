<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Product_Tag;
use App\Product_Size;
use App\Color;
use DB;

class FilterController extends Controller
{
    public function index(Color $color)
    {
      $products = $color->product;

      $productsview = Product::with('ProductSizing', 'ProductTag','ProductImages')
      ->join('product_colors', 'products.id', '=', 'product_colors.product_id')
      ->join('colors', 'colors.id', '=', 'product_colors.color_id')
      ->where('colors.name', '=', $color->name)
      ->paginate(9);
      $colors = Color::all();
      return view('photographyfilter', compact('productsview','products','colors'));
    }

    public function show($id)
    {
      $product = Product::find($id);
    }
}
