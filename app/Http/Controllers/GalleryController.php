<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Auth;
use App\Product_Tag;
use App\Product_Size;

class GalleryController extends Controller
{
  public function index() {


    $id = Auth::user()->id;
    $productsgallery = Product::with('ProductSizing', 'ProductTag','ProductImages')
    ->join('users', 'users.id', '=', 'products.user_id')
    ->join('product_images', 'products.id', '=', 'product_images.product_id')
    ->where('user_id', $id)
  	->orderBy('product_name', 'desc')
  	->paginate(9);

    return view('gallery', compact('productsgallery'));
  }
}
