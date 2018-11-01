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
								<h6><strong>Styles:</strong></h6>
								<div class="checkbox">
									<label><input type="checkbox" value="">Journalism</label>
								</div>
								<div class="checkbox">
									<label><input type="checkbox" value="">Surrealism</label>
								</div>
								<div class="checkbox">
									<label><input type="checkbox" value="" >Fashion</label>
								</div>
								<div class="checkbox">
									<label><input type="checkbox" value="" >Portraits</label>
								</div>
								<div class="checkbox">
									<label><input type="checkbox" value="" >Street</label>
								</div>
								<hr class="style10">
								<h6><strong>Colors:</strong></h6>
								<div class="checkbox">
									<label><input type="checkbox" value="">Black</label>
								</div>
								<div class="checkbox">
									<label><input type="checkbox" value="">White</label>
								</div>
								<div class="checkbox">
									<label><input type="checkbox" value="">Green</label>
								</div>
								<div class="checkbox">
									<label><input type="checkbox" value="" >Red</label>
								</div>
								<div class="checkbox">
									<label><input type="checkbox" value="" >Yellow</label>
								</div>
								<hr class="style10">
								<h6><strong>Orientation:</strong></h6>
								<div class="checkbox">
									<label><input type="checkbox" value="">Portrait</label>
								</div>
								<div class="checkbox">
									<label><input type="checkbox" value="">Landscape</label>
								</div>
								<div class="checkbox">
									<label><input type="checkbox" value="">Square</label>
								</div>

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
		<div class="text-center" id="pagination">
			{!!$productspopular->render();!!}
		</div>

@endsection
