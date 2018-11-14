<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Address;
use App\Cart;
use App\Country;
use App\Order;
use Mollie;

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
        $countries = Country::all();
        return view('address', compact('cartlines', 'countries'));
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
			'FirstName' => 'required|min:2',
			'LastName' => 'required|min:2',
          'streetname'=>'required|min:2',
          'zipcode'=>'required|min:5',
          'place'=>'required|min:2',
          'country'=>'required'
        ]);

        $address = new Address();
		if(Auth::user()) {
			$address->user_id = Auth::user()->id;
		}
		$address->first_name = $validatedData['FirstName'];
		$address->last_name = $validatedData['LastName'];
        $address->streetname=$validatedData['streetname'];
        $address->zipcode=$validatedData['zipcode'];
        $address->place=$validatedData['place'];
        $address->country_id=$validatedData['country'];
        $address->save();

		if(Auth::guest()) {

		}

		$this->preparePayment(1);
        // return redirect('/address')->with('Success', 'You will receive an email regarding your order shortly');
    }
	public function preparePayment(int $price) {
		$order = new Order();
		$order->ordernumber = 'MZ-'.time();
		$order->address_id = 1;
		$order->shipping_method = 1;
		$order->save();


		$payment = Mollie::api()->payments()->create([
		'amount' => [
			'currency' => 'EUR',
			'value' => '10.00', // You must send the correct number of decimals, thus we enforce the use of strings
		],
		'description' => 'Payment '.$order->ordernumber,
		'webhookUrl' => route('webhooks.mollie'),
		'redirectUrl' => route('home'),
		]);

		$payment = Mollie::api()->payments()->get($payment->id);

		// redirect customer to Mollie checkout page
		return redirect($payment->getCheckoutUrl(), 303);
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
