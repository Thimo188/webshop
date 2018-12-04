@extends('layouts.app')

@section('content')

<div id="index" class="container">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="h-100">
					<div class="card">
						<div class="card-body">
							<h2>Filters</h2>
							Search
							<form action="{{route('search')}}" method="get">
								<input type="text" placeholder="Search..." name="search" class="form-control">
								<br/>
								<input type="submit" value="Search" class="form-control">
							</form>
							<hr class="style10">
							<label for='price'>Prijs:</label>
							<input type="text" id="price" name="price_range" value="" />


							<hr class="style10">
							<h6><strong>Colors:</strong></h6>
								@forelse($colors as $color)
								<div class="form-check" onClick="window.location = 'http://127.0.0.1:8000/3DArt/colors/{{$color->name}}/3';">
								  <label class="form-check-label">
								    <input type="radio" class="form-check-input" name="optradio">{{$color->name}}
								  </label>
								</div>
								@empty
								<p> no posts found </p>
								@endforelse

						</div>
					</div>
				</div>
			</div>

			<div class="col-md-9">
				<div class="row">
					@forelse($productsview as $product)
					<div class="col-md-4 card-margin d-flex align-items-stretch">
						<div class="card">
							<img class="card-img-top" src="{{asset($product->file)}}" alt="Card image cap">
							<div class="card-body">
								<h5 class="card-title">{{$product->product_name}}</h5>
            					<p class="card-text">{{ str_limit($product->product_description, 80) }}</p>
							</div>
							<div class="card-footer">
								<a href="/description/{{$product->id}}" class="btn btn-primary">Visit</a>
								<p style="float: right">€ {{ number_format($product->price, 2,'.',',')}}</p>
								<a href="{{ Route('wishlist.add', $product->id) }}" class="btn btn-lg btn-light">
									<img src="https://cdn3.iconfinder.com/data/icons/pyconic-icons-1-2/512/heart-outline-512.png" height="25" class="hello" alt=""/></a>
							</div>
						</div>
					</div>
					@empty
					<p> no posts found </p>
					@endforelse
				</div>
			</div>

		</div>
	</div>
</div>
</div>
<script>

$("#price").ionRangeSlider({
	hide_min_max: true,
	keyboard: true,
	min: 0,
	max: 100,
	from: 0,
	to: 100,
	type: 'double',
	step: 1,
	prefix: "€",
	grid: true,
	onChange: function (data) {
		from = data.from;
		to = data.to;
	},
	onFinish: function(data) {
		console.log(data);
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
			}
		});
		$.ajax({
			url: "",
			type: 'post',
			data: {'from': data.from, 'to': data.to},
			success: function() {
				location.reload();
			}
		});
	}
});
</script>
<div class="text-center" id="pagination">
	{!!$productsview->render();!!}
</div>

@endsection
