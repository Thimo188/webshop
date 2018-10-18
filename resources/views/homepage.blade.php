@extends('layouts.app')

@section('content')

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="images/carousel/Minimalist1.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <h3></h3>
        <p></p>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/carousel/3Dburger.jpg" alt="Second slide">
      <div class="carousel-caption d-none d-md-block">
        <h3></h3>
        <p></p>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/carousel/Nature1.jpg" alt="Third slide">
      <div class="carousel-caption d-none d-md-block">
        <h3></h3>
        <p></p>
      </div>

    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<div class="container">
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
</div>

  <h3> Latest items </h3>
  <div class="row h-100 justify-content-center align-items-center">
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
</div>
</div>

@endsection
