@extends('layouts.app')

@section('content')
<!-- <div class="container mt-5" id="product-section">
  <div class="row">
   <div class="col-md-4">
     <div class="card" style="width: 18rem;">
       <img class="card-img-top" src="images/description/eye.jpg" alt="Card image cap">
       <div class="card-body">
         <h5 class="card-title">Card title</h5>
         <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
         <a href="#" class="btn btn-lg btn-primary">Add to Cart</a>
         <a href="#" class="btn btn-lg btn-danger"><i class="fas fa-trash-alt"></i></a>
         </button>
       </div>
     </div>
   </div>
 </div>
</div> -->
<div class="container mt-5" id="product-section">
  <div class="row">
    @forelse($wished as $wishlistitem)
      <div class="col-md-4">

<!-- {{$wishlistitem->User()->first()->name}} -->
      <div class="card" style="width: 18rem">
      <img class="card-img-top" src="{{ $wishlistitem->Product()->first()->ProductImages()->first()->file }}" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">{{ $wishlistitem->Product()->first()->product_name }}</h5>
          <p class="card-text">{{ $wishlistitem->Product()->first()->product_description }}</p>
          <a href="{{ url('/description', $wishlistitem->product_id) }}" class="btn btn-lg btn-primary">Go to this product</a>
          <a href="{{ route('wishlist.destroy', $wishlistitem->id)}}" class="btn btn-lg btn-danger"><i class="fas fa-trash-alt"></i></a>
<!-- "{{ route('wishlist.show', [$wishlistitem->id]) }}" -->
        </div>
      </div>
    </div>
  @empty
    <p>No favourites yet</p>
  </div>

    @endforelse
  </div>
</div>

@endsection
