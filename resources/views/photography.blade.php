@extends('layouts.app')

@section('content')

<div id="index" class="container">
	<div id="search" class="row sticky-top">
		<div class="input-group">
			<div class="input-group-append">
				<button class="btn btn-outline-secondary dropdown-toggle float-right" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sort by</button>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="#">Action</a>
					<a class="dropdown-item" href="#">Another action</a>
					<a class="dropdown-item" href="#">Something else here</a>
					<div role="separator" class="dropdown-divider"></div>
					<a class="dropdown-item" href="#">Separated link</a>
				</div>
			</div>
		</div>
	</div>
		<div class="container">
		  <div class="row h-100 justify-content-center align-items-center">
		    <div class="card-deck">
					<div class="row">
						<div class="col-12 col-md-4 col-xl-3" id="sticky-sidebar">
							<div class="card sticky-top">
							<div class="card-body">
								<h2>Filters</h2>
								<h3>Categories</h3>
								<ul class="list-group">
									<li class="list-group-item active">Photography</li>
									<li class="list-group-item">Illustration</li>
									<li class="list-group-item">3D Art</li>
								</ul>
								<form>
									<div class="form-group">
									<label for="formControlRange">Price</label>
									<input type="range" class="form-control-range" id="formControlRange">
									</div>
								</form>
								<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
							</div>
							</div>
						</div>
		      @if(count($productspopular) > 0)
		      @foreach($productspopular as $product)
		      <div class="col-lg-3">
		        <div class="card h-100">
		          <img class="card-img-top" src="{{asset($product->ProductImages['file'])}}" alt="Card image cap">
		          <div class="card-body">
		            <h5 class="card-title">{{$product->product_name}}</h5>
		            <p class="card-text">{{$product->product_description}}</p>
		          </div>
		          <div class="card-footer">
		            <a href="/description/{{$product->id}}" class="btn btn-primary">Visit</a>
		          </div>
		        </div>
		      </div>
		      @endforeach
		      @else
		      <p> no posts found </p>
		      @endif
				</div>
			</div>
				</div>
			</div>
		</div>
@endsection
