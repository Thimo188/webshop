<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;
use App\Product_Tag;
use App\Product_Size;

class HomepageController extends Controller
{
  public function index() {

    # Query for getting the popular products on homepage
	$productspopular = Product::with('ProductSizing', 'ProductTag','ProductImages')
	->orderBy('product_name', 'desc')
	->take(4)
	->get();

    # Query for getting latest products on homepage
	$productslatest = Product::with('ProductSizing', 'ProductTag','ProductImages')
	->orderBy('created_at', 'desc')
	->take(4)
	->get();
    return view('homepage', compact('productspopular', 'productslatest'));
  }
  public function show($id)
  {
    $product = Product::find($id);
    return view('description', compact('product', 'id'));
  }
}
