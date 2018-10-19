<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Cart;
use App\Products;

class CartController extends Controller
{
    public function index() {
		if(Auth::guest()) {
			$ip = isset($_SERVER['HTTP_CLIENT_IP'])?$_SERVER['HTTP_CLIENT_IP']:isset($_SERVER['HTTP_X_FORWARDED_FOR'])?$_SERVER['HTTP_X_FORWARDED_FOR']:$_SERVER['REMOTE_ADDR'];
			$cartlines = Cart::with('Product')->where('ip', $ip)->get();
		} else {
			$cartlines = Cart::with('Product')->where('user_id', Auth::user()->id)->get();
		}

		return view('cart', compact('cartlines'));
	}
	public function create($id) {
		$ip = isset($_SERVER['HTTP_CLIENT_IP'])?$_SERVER['HTTP_CLIENT_IP']:isset($_SERVER['HTTP_X_FORWARDED_FOR'])?$_SERVER['HTTP_X_FORWARDED_FOR']:$_SERVER['REMOTE_ADDR'];
		if(Auth::guest()) {
			$cart = Cart::where('product_id', $id)->where('ip', $ip)->first();
			if(!empty($cart)) {
				$cart->amount++;
				$cart->save();
			} else {
				$cart = new Cart;
				$cart->ip = $ip;
				$cart->product_id = $id;
				$cart->amount = 1;
				$cart->save();
			}
		} else {
			$cart = Cart::where('product_id', $id)->where('user_id', Auth::user()->id)->first();
			if(!empty($cart)) {
				$cart->amount++;
				$cart->save();
			} else {
				$cart = new Cart;
				$cart->ip = $ip;
				$cart->product_id = $id;
				$cart->amount = 1;
				$cart->save();
			}
		}
		return redirect(url('/cart'));
	}
	public function destroy($id) {
		Cart::find($id)->delete();
		return redirect(url('/cart'));
	}
}
