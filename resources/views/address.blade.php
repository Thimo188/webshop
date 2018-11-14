@extends('layouts.app')

@section('content')
<div class="card-body">
	@if ($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div><br />
	@endif

</div>
</div>
</div>

<div class="container main">
	<div class="row">
		<div class="col-md-6">
			<h4 class="mb-3">Billing address</h4>
		</div>
		<div class="col-md-7">
          <form method="post" action="{{ route('address.store') }}">
              <div class="form-group">
                  @csrf
                  <div class="form-group">
                      <label for="FirstName">First Name:</label>
                      <input type="text" class="form-control" name="FirstName"/>
                  </div>
                  <div class="form-group">
                      <label for="LastName">Last Name:</label>
                      <input type="text" class="form-control" name="LastName"/>
                  </div>
                  <label for="name">Streetname:</label>
                  <input type="text" class="form-control" name="streetname"/>
              <div>
                @csrf
                  <select name="country">
                    @forelse($countries as $country)
                      <div class="form-group">
                      <option class= "form-control" value="{{$country->id}}">{{$country->name}}
                      </option>
                    </div>
                    @empty
                      <option value="none">No countries available</option>
                    @endforelse
                  </select>
              </div>
              <div class="form-group">
                  <label for="place">Place:</label>
                  <input type="text" class="form-control" name="place"/>
              </div>
              <div class="form-group">
                  <label for="quantity">Zipcode:</label>
                  <input type="text" class="form-control" name="zipcode"/>
              </div>
					<!-- <div class="col-md-6 mb-3">
						<label for="firstName">First name</label>
						<input type="text" class="form-control" id="firstName" placeholder="John" value="" required>
						<div class="invalid-feedback">
							Valid first name is required.
						</div>
					</div>
					<div class="form-group">
						<label for="LastName">Last Name:</label>
						<input type="text" class="form-control" name="LastName" required/>
					</div>
					<label for="name">Streetname:</label>
					<input type="text" class="form-control" name="streetname" required/>
					<div>
						<label for="country">Land:</label>
						<select name="country" class="form-control">
							@forelse($countries as $country)
								<option value="{{$country->id}}">{{$country->name}}</option>
							@empty
								<option value="none">No countries available</option>
							@endforelse
						</select>
					</div>
					<div class="form-group">
						<label for="place">Place:</label>
						<input type="text" class="form-control" name="place" required/>
					</div>
					<div class="form-group">
						<label for="quantity">Zipcode:</label>
						<input type="text" class="form-control" name="zipcode" required/>
					</div>
					<hr class="mb-4">

					<button type="submit" class="btn btn-primary">Continue to checkout</button>
			</form>

		</div>


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
				<td>{{number_format($line->amount,2,",",".")}}
				<td class="subttl" value="{{ $line->Product->price * $line->amount}}">{{number_format($line->Product->price * $line->amount,2,",",".")}}
			</tr>
			@endforeach
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>Excl. BTW:</td>
				<td id="exbtw">1</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>Incl. BTW:</td>
				<td id="inbtw">1</td>
			</tr>
		</table>
	</div>
</div>
</div>
<script>
	var totalPrice = 0;
	$('.subttl').each(function(index) {
		totalPrice += Number($(this).attr('value'));
	});
	$('#exbtw').text((totalPrice * 0.79).toFixed(2));
	$('#inbtw').text(totalPrice.toFixed(2));
	// $('#totalPrice').val(totalPrice.toFixed(2));
	// $('#address').submit(function(e) {
	// 	var formdata = $(this).serializeArray();
	// 	e.preventDefault();
	// 	$.ajax({
	// 		url: "{{ route('payments.create')}}",
	// 		method: 'post',
	// 		data: formdata,
	// 		success: function(result) {
	// 			console.log(result);
	// 		}
	// 	})
	// 	$('#price').val();
	// });
</script>
@endsection
