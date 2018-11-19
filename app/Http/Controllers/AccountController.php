<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Auth;

class AccountController extends Controller
{
  public function index() {
    return view('account');
  }
  public function showOrders() {
	  $orders = Order::where('user_id', Auth::user()->id)->get();
	  return view('Account.showOrders', compact('orders'));
  }
}
