@extends('layouts.app')

@section('content')

@include('partials.slider')
<div class="container">
    <div class="row">
        <h3>Populair items</h3>
    </div>
    <div class="row">
    @forelse($productspopular as $product)
      <div class="col-lg-3">
        <div class="card" style="">
        <img class="card-img-top" src="{{asset($product->ProductImages['file'])}}" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">{{ $product->product_name }}</h5>
            <p class="card-text">{{ $product->product_description }}</p>
            <a href="{{ route('description.show', [$product->id]) }}" class="btn btn-primary">Visit</a>
          </div>
        </div>
      </div>
    @empty
      <p>No product</p>
    @endforelse
  </div>

  <div class="row">
      <h3>Latest items</h3>
  </div>
  <div class="row">
    @forelse($productslatest as $product)
      <div class="col-lg-3">
        <div class="card">
        <img class="card-img-top" src="{{asset($product->ProductImages['file'])}}" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">{{ $product->product_name }}</h5>
            <p class="card-text">{{ $product->product_description }}</p>
            <a href="{{ route('description.show', [$product->id]) }}" class="btn btn-primary">Visit</a>
          </div>
        </div>
      </div>
    @empty
      <p>No product</p>
    @endforelse
  </div>
</div>


@endsection
