<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Address;
use App\Cart;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		if(Auth::guest()) {
			$ip = isset($_SERVER['HTTP_CLIENT_IP'])?$_SERVER['HTTP_CLIENT_IP']:isset($_SERVER['HTTP_X_FORWARDED_FOR'])?$_SERVER['HTTP_X_FORWARDED_FOR']:$_SERVER['REMOTE_ADDR'];
			$cartlines = Cart::with('Product')->where('ip', $ip)->get();
		} else {
			$cartlines = Cart::with('Product')->where('user_id', Auth::user()->id)->get();
		}
        return view('address', compact('cartlines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('address');
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
          'streetname'=>'required',
          'zipcode'=>'required',
          'place'=>'required',
          'country_id'=>'required'
        ]);

        $address = new Address();
        $address->user_id = 1;
        $address->streetname=$validatedData['streetname'];
        $address->zipcode=$validatedData['zipcode'];
        $address->place=$validatedData['place'];
        $address->country_id=$validatedData['country_id'];
        $address->save();
        return redirect('/address')->with('Success', 'You will receive an email regarding your order shortly');
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
