<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Products;

class CartController extends Controller
{
    public function index() {
		return view('cart');
	}
}
