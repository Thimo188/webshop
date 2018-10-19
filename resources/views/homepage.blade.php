@extends('layouts.app')

@section('content')

@include('partials.slider')
<!-- <div class="container">
  <h3> Popular items </h3>
  <div class="row h-100 justify-content-center align-items-center">
    <div class="card-deck">
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
            <a href="/description/{{$product->id}}" class="btn btn-primary">Visit Product</a>
          </div>
        </div>
      </div>
      @endforeach
      @else
      <p> no posts found </p>
      @endif

  </div>
</div> -->

  <!-- <h3> Latest items </h3> -->
  <!-- <div class="row h-100 justify-content-center align-items-center">
    <div class="card-deck">
      @if(count($productslatest) > 0)
      @foreach($productslatest as $product)
      <div class="col-lg-3">
        <div class="card h-100">
          <img class="card-img-top" src="{{asset($product->ProductImages['file'])}}" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">{{$product->product_name}}</h5>
            <p class="card-text">{{$product->product_description}}</p>
          </div>
          <div class="card-footer">
            <a href="/description/{{$product->id}}" class="btn btn-primary">Visit Product</a>
          </div>
        </div>
      </div>
      @endforeach
      @else
      <p> no posts found </p>
      @endif
    </div>
</div> -->
<!-- </div> -->

<div class="container">
  <h3>Populair items</h3>
  <div class="row">
    @forelse($productspopular as $product)
      <div class="col-lg-3">
        <div class="card" style="">
        <img class="card-img-top" src="{{asset($product->ProductImages['file'])}}" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">{{ $product->product_name }}</h5>
            <p class="card-text">{{ $product->product_description }}</p>
            <a href="{{ route('description.show', [$product->id]) }}" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>
    @empty
      <p>No product</p>
    @endforelse
  </div>

  <h3>Latest items</h3>
  <div class="row h-100 justify-content-center align-items-center">
    @forelse($productslatest as $product)
      <div class="col-lg-3">
        <div class="card">
        <img class="card-img-top" src="{{asset($product->ProductImages['file'])}}" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">{{ $product->product_name }}</h5>
            <p class="card-text">{{ $product->product_description }}</p>
            <a href="{{ route('description.show', [$product->id]) }}" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>
    @empty
      <p>No product</p>
    @endforelse
  </div>
</div>


@endsection
