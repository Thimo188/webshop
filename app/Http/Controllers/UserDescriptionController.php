<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserDescriptionController extends Controller
{
    public function index(){
      return view('editdescription');
    }
}
