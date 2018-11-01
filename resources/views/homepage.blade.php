@extends('layouts.app')

@section('content')

@include('partials.slider')
<div class="container">
    <div class="row">
        <h3>Popular items</h3>
    </div>
    <div class="row">
    @forelse($productspopular as $product)
    <div class="col-lg-3 d-flex align-items-stretch">
      <div class="card">
      <img class="card-img-top" src="{{asset($product->ProductImages['file'])}}" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">{{ $product->product_name }}</h5>
          <p class="card-text">{{ str_limit($product->product_description, 100) }}</p>
        </div>
          <div class="card-footer">
            <a href="/description/{{$product->id}}" class="btn btn-primary">Visit</a>
            <p style="float: right">€ {{$product->price}}</p>
            <a href="{{ Route('wishlist.add', $product->id) }}" class="btn btn-lg btn-light">
              <img src="https://cdn3.iconfinder.com/data/icons/pyconic-icons-1-2/512/heart-outline-512.png" height="25" class="hello" alt=""/></a>
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
      <div class="col-lg-3 d-flex align-items-stretch">
        <div class="card">
        <img class="card-img-top" src="{{asset($product->ProductImages['file'])}}" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">{{ $product->product_name }}</h5>
            <p class="card-text">{{ str_limit($product->product_description, 100) }}</p>
          </div>
            <div class="card-footer">
              <a href="/description/{{$product->id}}" class="btn btn-primary">Visit</a>
              <p style="float: right">€ {{$product->price}}</p>
              <a href="{{ Route('wishlist.add', $product->id) }}" class="btn btn-lg btn-light">
                <img src="https://cdn3.iconfinder.com/data/icons/pyconic-icons-1-2/512/heart-outline-512.png" height="25" class="hello" alt=""/></a>
            </div>
        </div>
      </div>
    @empty
      <p>No product</p>
    @endforelse
  </div>
</div>


@endsection
