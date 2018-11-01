@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h4 class="mb-3">Billing address</h4>
		</div>
		<div class="col-md-7">
			<form method="post" action="{{ route('address.store') }}">
				@csrf
				<div class="row">
					<div class="col-md-6 mb-3">
						<label for="firstName">First name</label>
						<input type="text" class="form-control" id="firstName" placeholder="John" value="" required>
						<div class="invalid-feedback">
							Valid first name is required.
						</div>
					</div>
					<div class="col-md-6 mb-3">
						<label for="lastName">Last name</label>
						<input type="text" class="form-control" id="lastName" placeholder="Doe" value="" required>
						<div class="invalid-feedback">
							Valid last name is required.
						</div>
					</div>
				</div>

				<div class="mb-3">
					<label for="email">Email <span class="text-muted">(Optional)</span></label>
					<input type="email" class="form-control" id="email" placeholder="you@example.com">
					<div class="invalid-feedback">
						Please enter a valid email address for shipping updates.
					</div>
				</div>

				<div class="mb-3">
					<label for="streetname">Street</label>
					<input type="text" class="form-control" name="streetname" placeholder="1234 Main St" required>
					<div class="invalid-feedback">
						Please enter your shipping address.
					</div>
				</div>



				<div class="mb-3">
					<label for="price">Country </label>
					<input type="text" class="form-control" name="country_id" />
					<div class="invalid-feedback">
						Please enter your shipping address.
					</div>
				</div>


				<div class="mb-3">
					<label for="price">Zipcode </label>
					<input type="text" class="form-control" name="zipcode" />
					<div class="invalid-feedback">
						Please enter your shipping address.
					</div>
				</div>

				<hr class="mb-4">
				<button type="submit" class="btn btn-primary">Continue to checkout</button>
			</form>
		</div>
		<div class="col-md-4 offset-md-1">
			<b>Order</b>
			<table width="100%" class="table">
				<tr>
					<th width="50%">Product</th>
					<th>&nbsp;</th>
					<th width="28%">Qty</th>
					<th>Prijs</th>
				</tr>
				@foreach($cartlines as $line)
					<tr>
						<td>{{$line->Product->product_name }}</td>
						<td></td>
						<td>{{$line->amount}}
						<td>{{$line->Product->price * $line->amount}}
					</tr>
				@endforeach
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>Excl. BTW:</td>
					<td>1</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>Incl. BTW:</td>
					<td>1</td>
				</tr>
			</table>
		</div>
	</div>
</div>

@endsection
