<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use Auth;

class AjaxController extends Controller
{
    public function updateCart(Request $request) {
		if(Auth::guest()) {
			$ip = isset($_SERVER['HTTP_CLIENT_IP'])?$_SERVER['HTTP_CLIENT_IP']:isset($_SERVER['HTTP_X_FORWARDED_FOR'])?$_SERVER['HTTP_X_FORWARDED_FOR']:$_SERVER['REMOTE_ADDR'];
			$cartline = Cart::where('product_id', $request->productid)->where('ip', $ip)->firstOrFail();
		} else {
			$cartline = Cart::where('product_id', $request->productid)->where('user_id', Auth::user()->id)->firstOrFail();
		}
        if($request->amount != 0) {
            $cartline->amount = $request->amount;
            $cartline->save();
        } else {
            $cartline->delete();
        }
	}
}
