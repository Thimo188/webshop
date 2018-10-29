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
								<form>
									<input type="text" placeholder="Search..." name="search" class="form-control">
									<br/>
									<input type="submit" value="Search" class="form-control">
								</form>
								<br/>
								<label for='price'>Prijs:</label>
								<input type="text" id="price" name="price_range" value="" />

								Categories
								<ul class="list-group">
									<li class="list-group-item active">Photography</li>
									<li class="list-group-item">Illustration</li>
									<li class="list-group-item">3D Art</li>
								</ul>


							</div>
						</div>
				</div>
			</div>

			<div class="col-md-9">
				<div class="row">
		      @forelse($productspopular as $product)
			      <div class="col-md-4 card-margin">
			        <div class="card">
			          <img class="card-img-top" src="{{asset($product->ProductImages['file'])}}" alt="Card image cap">
			          <div class="card-body">
			            <h5 class="card-title">{{$product->product_name}}</h5>
			            <p class="card-text">{{$product->product_description}}</p>
			          </div>
			          <div class="card-footer">
			            <a href="/description/{{$product->id}}" class="btn btn-primary">Visit</a>
						<p style="float: right">€ {{$product->price}}</p>
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

@endsection
