<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Color;

class SearchController extends Controller
{
  public function search(Request $request, Color $Color)
  {
    $colors = Color::all();
    $productsview=Product::searchproduct($request->search);
    return view('photography', compact('productsview', 'colors'));
    //where('product_name', 'LIKE', '%' . $request->search . '%')
    //search($request->search)->paginate(15);
  }

  public function product(Request $request, $id)
  {
      $product = Product::find($id);

      return view('product_name', compact('product'));
  }
}
