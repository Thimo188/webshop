@extends('layouts.app')

@section('content')
<div class="container mt-5" id="product-description">
  <div class="row">
    <div class="col-md-6">
      <!-- The product image will be placed here -->
      <img
      src="{{asset($product->ProductImages['file'])}}"
      alt="image not found"
      class="responsive"
      />
    </div>
    <div class="container col-md-6">
      <h1>{{$product->product_name}}</h1>
      <p class="description">
        {{$product->product_description}}
      </p>
      <!-- WHO IS THE AUTHOR -->
      <p=class="description">
      <i>Artist: Karel</i>
    </p>
    <h2 class="product-price">€{{$product->price}}</h2>
    <a href="{{ url('/addToCart', $id) }}" class="btn btn-lg btn-primary">
      Add to Cart
    </a>
    <a href="{{ Route('wishlist.add', $id) }}" class="btn btn-lg btn-light">
      <img src="https://cdn3.iconfinder.com/data/icons/pyconic-icons-1-2/512/heart-outline-512.png" height="25" class="hello" alt=""/></a>
    </a>
    <p class="description">
      In Stock
    </p>
    <!-- PRODUCT TAGS -->
    <p class="description">
      {{$product->ProductTag['name']}}
    </p>
  </div>
</div>
</div>
</div>
@endsection
