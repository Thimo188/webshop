@extends('layouts.app')

@section('content')
<div class="container mt-5" id="product-section">
  <div class="row">
   <div class="col-md-6">
     <!-- The product image will be placed here -->
     <img
        src="images/description/eye.jpg"
        alt="Colourful eye"
        class="responsive"
        />
    </div>
    <div class="col-md-6">
       <h1>Eye on a trip</h1>
           <p class="description">
             Have you ever dreamed of running a bookshop?
             You can have a go for a week at the Open Book Store in Wigton,
             Scotland. In fact, if you book a holiday at the self-catering
             flat on Airbnb, you also have to work for 40 hours in the
             bookshop downstairs.
           </p>
<!-- WHO IS THE AUTHOR -->
           <p=class="description">
           <i>Artist: Karel</i>
         </p>
           <h2 class="product-price">$129.00</h2>
           <div class="row">
           </div>
            <button class ="btn btn-lg btn-primary">
              Add to Cart
               </button>
               <button class ="btn btn-sm btn-primary">
                 <img
                 src="images/description/heart.png"
                 />
               </button>
                 <p class="description">
                   In Stock
                 </p>
                 <!-- PRODUCT TAGS -->
                 <p class="description">
                   #red #colourful #eye #PHP #googlechrome
                 </p>
          </div>
         </div>
       </div>
@endsection
