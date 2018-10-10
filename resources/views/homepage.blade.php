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
         <div class="col-lg-3">
           <div class="card h-100">
             <img class="card-img-top" src="https://s3-us-west-2.amazonaws.com/lightstalking-assets/wp-content/uploads/2017/02/31171404/contrast-608131_1280.jpg" alt="Card image cap">
             <div class="card-body">
               <h5 class="card-title">Stripes & sets</h5>
               <p class="card-text">Using minimalism to capture tight lines in the city.</p>
             </div>
             <div class="card-footer">
               <a href="#" class="btn btn-primary">Go somewhere</a>
             </div>
           </div>
         </div>
         <div class='col-lg-3'>
           <div class="card h-100">
             <img class="card-img-top" src="https://keyassets.timeincuk.net/inspirewp/live/wp-content/uploads/sites/12/2016/09/Michael-Kenna-Basilica-di-San-Giorgio-Maggiore-from-San-Marco-Venice-Italy-1990.jpg" alt="Card image cap">
             <div class="card-body">
               <h5 class="card-title">Lonely piers</h5>
               <p class="card-text">Capturing feelings of loneliness at 13:00.</p>
             </div>
             <div class="card-footer">
               <a href="#" class="btn btn-primary">Go somewhere</a>
             </div>
           </div>
         </div>
         <div class='col-lg-3'>
           <div class="card h-100">
             <img class="card-img-top" src="https://images.pexels.com/photos/236047/pexels-photo-236047.jpeg?auto=compress&cs=tinysrgb&h=350" alt="Card image cap">
             <div class="card-body">
               <h5 class="card-title">Safari</h5>
               <p class="card-text">Picture I made when I was on holiday with my family.</p>
             </div>
             <div class="card-footer">
               <a href="#" class="btn btn-primary">Go somewhere</a>
             </div>
           </div>
         </div>
         <div class='col-lg-3'>
           <div class="card h-100">
             <img class="card-img-top" src="https://img.freepik.com/free-vector/vector-illustration-cosmonaut_1441-11.jpg?size=338c&ext=jpg" alt="Card image cap">
             <div class="card-body">
               <h5 class="card-title">Astronaut in space</h5>
               <p class="card-text">Drawing rendered in Adobe Illustrator CC</p>
             </div>
             <div class="card-footer">
               <a href="#" class="btn btn-primary">Go somewhere</a>
             </div>
           </div>
         </div>
       </div>
     </div>

    <h3> Latest items </h3>
 <div class="row h-100 justify-content-center align-items-center">
      <div class="card-deck">
        <div class="col-lg-3">
          <div class="card h-100">
            <img class="card-img-top" src="https://www.whisky-online.com/images/products/6300-9041macallanmastersofphotographystevenkleinprint1.jpg" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Magazine cover</h5>
              <p class="card-text">Red & blue filters for a magazine cover I made.</p>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="card h-100">
            <img class="card-img-top" src="https://i.ytimg.com/vi/vgKr6QdyDcs/maxresdefault.jpg" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Lolita</h5>
              <p class="card-text">Old drawing made with watecolor style in mind.</p>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
        <div class='col-lg-3'>
          <div class="card h-100">
            <img class="card-img-top" src="https://img2.cgtrader.com/items/247183/5e5d6e8205/plastic-ring-a-3d-model-stl-3dm.jpg" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Classic ring</h5>
              <p class="card-text">Beautiful rendered 3D ring that makes a fine gift.</p>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
        <div class='col-lg-3'>
          <div class="card h-100">
            <img class="card-img-top" src="https://i1.wp.com/laurazalenga.com/wp-content/uploads/2015/04/zl.jpg?fit=2000%2C1125" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Humanity captured</h5>
              <p class="card-text">Self-portrait capturing how I express certain feelings.</p>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
