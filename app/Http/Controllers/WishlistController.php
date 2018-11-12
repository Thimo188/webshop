<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wishlist;
use App\Product;
use App\Product_Images;
use App\Products;
use Auth;

class WishlistController extends Controller
{
    public function index()
  {
    $wished = Wishlist::with('Product', 'User')->get();
		return view('wishlist', compact('wished'));
	}

  public function create()
  {
      //
  }

  public function store(Request $request)
  {
      $wishlistitem = new Wishlist();
      $wishlistitem->user_id = Auth::user()->id;
      $wishlistitem->product_id = $request->id;
      $wishlistitem->save();
      return redirect(url('/wishlist'));
  }

  public function show($id)
  {
      $product = Product::find($id);
      return view('description', compact('product','id'));
  }

  public function edit($id)
  {
      //
  }

  public function update()
  {
      //
  }

  public function destroy($id) {
		Wishlist::findOrFail($id)->delete();
		return redirect(url('/wishlist'));
	}


}
