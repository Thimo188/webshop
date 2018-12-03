<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Subscription;
use Carbon\Carbon;
use Auth;
use Mollie;

class SubscriptionController extends Controller
{
    public function index() {
      return view('subscription');
    }
	public function buySubscription($id) {
        $totalprice = null;
		if($id == 1)
			$totalprice = 4.00;
		if($id == 2)
			$totalprice = 9.00;
		if($id == 3)
			$totalprice = 12.50;
		$payment = Mollie::api()->payments()->create([
		'amount' => [
			'currency' => 'EUR',
			'value' => number_format($totalprice, 2), // You must send the correct number of decimals, thus we enforce the use of strings
		],
		'description' => 'Payment subscription',
		'webhookUrl' => route('webhooks.subscription'),
		'redirectUrl' => route('subscription.redirect'),
		]);

		$payment = Mollie::api()->payments()->get($payment->id);
		return redirect($payment->getCheckoutUrl(), 303);
	}
	public function mollieWebhook() {
		$payment = Mollie::api()->payments()->get($request->id);

		if ($payment->isPaid() && !$payment->hasRefunds() && !$payment->hasChargebacks()) {
				$subscription = new Subscription;
				$subscription->enddate = Carbon::now()->addMonths(1);
				if($payment->amount == 4.00) {
					$subscription->amount = 3;
				} else if($payment->amount == 10.00) {
					$subscription->amount = 10;
				} else if($payment->amount == 12.50) {
					$subscription->amount = 15;
				} else {
					return redirect(route('home'));
				}
				$subscription->user_id = Auth::user()->id;
				$subscription->save();
	    }
	}

}
