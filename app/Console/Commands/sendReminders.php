<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Cart;
use Mail;
use App\Mail\sendReminder;

class sendReminders extends command {
    protected $signature = 'webshop:sendReminders';

    protected $description = 'Sends reminders to carts that havent been finished';

    public function _construct() {
        parent::__construct();
    }
    public function handle() {
		$cartLines = Cart::all();
		foreach($cartLines as $cartLine) {
			if($cartline->created_at > Carbon::now()->addMinutes(-32) && $cartline->created_at < Carbon::now()->addMinutes(-15)) {
				Mail::to($cartline->User()->email)->send(new sendReminder);
			}
		}
    }
}
