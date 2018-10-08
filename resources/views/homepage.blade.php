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
        <img class="d-block w-100" src="https://static.vecteezy.com/system/resources/previews/000/192/828/non_2x/vector-abstract-landscape-illustration.jpg" alt="First slide">
        <div class="carousel-caption d-none d-md-block">
          <h3>Popular illustrations</h3>
          <p>Find the most popular illustrations right now!</p>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="https://images.pexels.com/photos/4827/nature-forest-trees-fog.jpeg?auto=compress&cs=tinysrgb&h=350 " alt="Second slide">

        <div class="carousel-caption d-none d-md-block">
          <h3>Photos of nature</h3>
          <p>The perfect images to hang in your living room.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="https://assets.pinshape.com/uploads/image/file/2633/container_elephant-3d-printing-2633.jpg" alt="Third slide">
        <div class="carousel-caption d-none d-md-block">
          <h3>3D Collectibles</h3>
          <p>Small 3D prints to create for fun.</p>
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

  @endsection
