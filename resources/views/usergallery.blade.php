@extends ('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12 mt-5">

      <span class="align-text-center" style="text-align:center"><h2>{{$userid->name}}</h2>
        <h2>____</h2>
        <br />
        <h4>A little bit about {{$userid->name}}</h4>
        <br />
        <div class="row justify-content-center">
          <div class="col-md-4">
        <b>I enjoy making websites with my teammates Omid, Charlie and Thimo even though I am better than them in every way possible!</b>
        </div>
        </div>
      </span>
    </div>
  </div>
</div>

<br />

<div id="index" class="container">
	<div class="container mt-5">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					@forelse($productsgallery as $product)
					<div class="col-lg-3 d-flex align-items-stretch">
						<div class="card">
							<img class="card-img-top" src="{{asset($product->ProductImages['file'])}}" alt="Card image cap">
							<div class="card-body">
								<h5 class="card-title">{{$product->product_name}}</h5>
								<p class="card-text">{{ str_limit($product->product_description, 80) }}</p>
							</div>
							<div class="card-footer">
								<a href="/description/{{$product->id}}" class="btn btn-primary">Visit</a>
								<p style="float: right">€ {{ number_format($product->price, 2,'.',',')}}</p>

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

@endsection
