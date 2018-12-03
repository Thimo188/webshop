<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\upload_form;

use Illuminate\Support\Facades\Input;
use App\Product;
use App\Product_Image;
use App\OrderDetail;
use App\Product_Tag;
use App\Subscription;
use Auth;
use App\Order;
use Carbon\Carbon;
use App\Category;
use App\Color;
use App\Product_Category;
use App\Product_Color;


class UploadController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $category_list = Category::all();
    $colors = Color::all();
    return view('upload_form', compact('category_list', $category_list, 'colors', $colors));
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
    $subscription = Subscription::where('user_id', Auth::user()->id);
    $orders = Order::where('created_at', '>=', Carbon::now()->addMonths(-1))->count();
    if($subscription->count() > 0) {
      if($orders >= $subscription->get()->amount) {
        return redirect()->back()->withErrors(['msg', 'You have reached your subscription limit for this month']);
      }
    }
    $validatedData = $request->validate([
      'name' => 'required|max:255',
      'description' => 'required|max:300',
      'photos' => 'required',
      'photos.*' => 'image|mimes:jpeg,bmp,png,jpg',
      'Tag1' => 'required',
      'Tag2',
      'Tag3',
      'price' => 'required|min:1',
      'category' => 'required',
      'color1' => 'required',
      'color2',
      'color3',

    ]);


    //if($validatedData->fails()){

   //return Redirect::back()->withErrors($validatedData)->withInput();
    //}




    $product = new Product();
    $product->product_name=$validatedData['name'];
    $product->product_description=$validatedData['description'];
    $product->price=$validatedData['price'];
    $product->user_id = Auth::user()->id;
    $product->save();

    //if ($product_price->validate() == 0) {
      //return redirect()->back()->withErrors($product_price)->withInput();
    //}

    //$user->roles()->attach($roleId);


    $product_category = new Product_Category();
    $product_category->category_id=$validatedData['category'];
    $product_category->product_id=$product->id;
    $product_category->save();
    //dd($request->all());

    $product_color = new Product_Color();
    $product_color->color_id=$validatedData['color1'];
    $product_color->product_id=$product->id;
    $product_color->save();

    $product_color = new Product_Color();
    $product_color->color_id=$validatedData['color2'];
    $product_color->product_id=$product->id;
    $product_color->save();

    $product_color = new Product_Color();
    $product_color->color_id=$validatedData['color3'];
    $product_color->product_id=$product->id;
    $product_color->save();

    $product_tag = new Product_Tag();
    $product_tag->name=$validatedData['Tag1'];
    $product_tag->product_id=$product->id;
    $product_tag->save();

    $product_tag = new Product_Tag();
    $product_tag->name=$validatedData['Tag2'];
    $product_tag->product_id=$product->id;
    $product_tag->save();

    $product_tag = new Product_Tag();
    $product_tag->name=$validatedData['Tag3'];
    $product_tag->product_id=$product->id;
    $product_tag->save();

    foreach ($validatedData['photos'] as $key => $image) {
      $product_image = new Product_Image;
      $product_image->product_id=$product->id;
      $filename = $image->getClientOriginalName();
      $FilePath = 'public/product/';
      $image->storeAs($FilePath, $filename);
      $product_image->file= 'storage/product/' . $filename;
      $product_image->save();
    }
    return redirect(url('/upload'));








  }


  /**

  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
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
