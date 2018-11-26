<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class EditEmailController extends Controller
{
    public function index(){



      return view ('editmail');
    }


    public function editEmail(Request $request, $id)
    {
      $validatedData = $request->validate([
        'new-email' => 'required|email|min:2|exists:users',
      ]);

            dd($request->all());

      $user = Auth::user();
      $user->email = $request->get('new-email');
      $user->update();

      return redirect (url('/account'));

    }
}
