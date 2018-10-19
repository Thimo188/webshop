@extends('layouts.app')

@section('content')
<div class="container mt-5" id="product-section">
  <div class="row">
   <div class="col-md-4">
     <div class="card" style="width: 18rem;">
       <img class="card-img-top" src="images/description/eye.jpg" alt="Card image cap">
       <div class="card-body">
         <h5 class="card-title">Card title</h5>
         <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
         <a href="#" class="btn btn-lg btn-primary">Add to Cart</a>
         <button class ="btn btn-lg btn-danger">
           <i class="fas fa-trash-alt"></i>
       </div>
     </div>
   </div>
   <div class="col-md-4">
     <div class="card" style="width: 18rem;">
       <img class="card-img-top" src="images/description/eye.jpg" alt="Card image cap">
       <div class="card-body">
         <h5 class="card-title">Card title</h5>
         <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
         <a href="#" class="btn btn-lg btn-primary">Add to Cart</a>
         <button class ="btn btn-lg btn-danger">
           <i class="fas fa-trash-alt"></i>
       </div>
     </div>
   </div>
</div>
</div>

@endsection
