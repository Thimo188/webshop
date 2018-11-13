<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class SearchController extends Controller
{
  public function search(Request $request)
  {

    $productsview=Product::search($request->search)->paginate(15);
    return view('photography', compact('productsview'));
    //where('product_name', 'LIKE', '%' . $request->search . '%')
    //search($request->search)->paginate(15);
  }

  public function product(Request $request, $id)
  {
      $product = Product::find($id);

      return view('product_name', compact('product'));
  }
}
