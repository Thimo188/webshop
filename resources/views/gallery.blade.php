@extends ('layouts.sidemenu')

@section('content')


<div id="index" class="container">
<div class="container mt-5">
<div class="row">
<div class="col-md-12">
  <div class="row">
    @forelse($productsgallery as $product)
    <div class="col-md-4 card-margin d-flex align-items-stretch">
      <div class="card">
        <img class="card-img-top" src="{{asset($product->ProductImages['file'])}}" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">{{$product->product_name}}</h5>
                <p class="card-text">{{ str_limit($product->product_description, 80) }}</p>
        </div>
        <div class="card-footer">
          <a href="/description/{{$product->id}}" class="btn btn-primary">Visit</a>
          <p style="float: right">€ {{ number_format($product->price, 2,'.',',')}}</p>
          <a href="{{ Route('wishlist.add', $product->id) }}" class="btn btn-lg btn-light">
            <img src="https://cdn3.iconfinder.com/data/icons/pyconic-icons-1-2/512/heart-outline-512.png" height="25" class="hello" alt=""/></a>
        </div>
      </div>
    </div>
    @empty
    <p> no posts found </p>
    @endforelse
  </div>
</div>
</div>
</div>
</div>

@endsection
