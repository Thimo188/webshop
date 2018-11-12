<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\upload_form;

use Illuminate\Support\Facades\Input;
use App\Product;
use App\Product_image;
use App\Order_Detail;
use App\Product_Tag;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('upload_form');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('upload_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $this->validate($request, [
          'name' => 'required|max:255',
          'description' => 'required|max:300',
          'photos' => 'required',
          'photos.*' => 'image|mimes:jpeg,bmp,png,jpg',
          'tags' => 'required',
          'price' => 'required'

        ]);


        $product = new Product();
        $product->product_name=$validatedData['name'];
        $product->product_description=$validatedData['description'];
        $product->price=$validatedData['price'];
        $product->save();


        $product_tag = new Product_Tag();
        $product_tag->name=$validatedData['tags'];
        $product_tag->product_id=$product->id;
        $product_tag->save();

        foreach ($validatedData['photos'] as $key => $image) {
          $product_image = new Product_Image();
          $product_image->product_id=$product->id;
          $filename = $image->getClientOriginalName();
          $FilePath = 'public/product/';
          $image->storeAs($FilePath, $filename);
          $product_image->file= 'storage/product/' . $filename;
          $product_image->save();
          }
          return redirect(url('/upload'));


      //  $order_detail = new Order_Detail();
      //  $order_detail->product_price=$validatedData['price'];
      //  $order_detail->product_id=$product->id;
      //  $order_detail->save();






        }





    /**

     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
