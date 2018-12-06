<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Auth;
use App\Product_Tag;
use App\Product_Size;
use App\ProductImages;
use App\User;
use Carbon\Carbon;

class GalleryController extends Controller
{
  public function index() {
    $productsgallery = Product::with('ProductSizing', 'ProductTag','ProductImages')
    ->join('users', 'users.id', '=', 'products.user_id')
    ->join('product_images', 'products.id', '=', 'product_images.product_id')
    ->where('user_id', Auth::user()->id)
  	->orderBy('product_name', 'desc')
  	->paginate(9);
    return view('gallery.index', compact('productsgallery'));
  }

  public function show($id)
      {

      }

      /**
       * Show the form for editing the specified resource.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function edit($id)
      {

        $product = Product::find($id);
        $producttags = Product::with('ProductSizing', 'ProductTag','ProductImages');

        #Check for correct user to edit own posts
        if(auth()->user()->id !== $product->user_id){
          return redirect('/gallery')->with('Failed', 'Not Authorized');
        }

        return view('gallery.edit', compact('product','producttags'));
      }

      /**
       * Update the specified resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function update(Request $request, $id)
      {
            $request->validate([
              'name' => 'required|max:255',
              'description' => 'required|max:300',
              'price' => 'required',
              'tags' => 'required',
        ]);

        $product = Product::find($id);
        $product->product_name = $request->get('name');
        $product->product_description = $request->get('description');
        $product->price = $request->get('price');
        $product->save();

        $product_tag = Product_Tag::find($id);
        $product_tag->name = $request->get('tags');
        $product_tag->save();

        return redirect('/gallery')->with('success', 'Stock has been updated');
      }

      /**
       * Remove the specified resource from storage.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function destroy($id)
      {
        $product = Product::find($id);
        $product->ProductImages()->delete();
        $product->ProductColor()->delete();
        $product->ProductTag()->delete();
        $product->ProductCategory()->delete();
        $product->delete();

         return redirect(url('/gallery'));}
}
