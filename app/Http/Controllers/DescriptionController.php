<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Description;
use App\Products;

class DescriptionController extends Controller
{
  public function index() {
		return view('description');
	}
}
