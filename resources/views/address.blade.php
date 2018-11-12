@extends('layouts.app')

@section('content')
<div class="container mt-5">
<div class="card uper">
  <div class="card-header">
    Billing address
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('address.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Streetname:</label>
              <input type="text" class="form-control" name="streetname"/>
          </div>
          <div class="form-group">
              <label for="price">Country :</label>
              <input type="text" class="form-control" name="country_id"/>
          </div>
          <div class="form-group">
              <label for="quantity">Place:</label>
              <input type="text" class="form-control" name="place"/>
          </div>
          <div class="form-group">
              <label for="quantity">Zipcode:</label>
              <input type="text" class="form-control" name="zipcode"/>
          </div>
          <button type="submit" class="btn btn-primary">Add</button>
      </form>
  </div>
</div>
</div>

  <div class="container mt-5">

    <form method="post" action="{{ route('address.store') }}">
      <div class="col-md-6 offset-md-3">
        <h4 class="mb-3">Billing address</h4>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="firstName">First name</label>
              <input type="text" class="form-control" id="firstName" placeholder="John" value="" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="lastName">Last name</label>
              <input type="text" class="form-control" id="lastName" placeholder="Doe" value="" required>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label for="email">Email <span class="text-muted">(Optional)</span></label>
            <input type="email" class="form-control" id="email" placeholder="you@example.com">
            <div class="invalid-feedback">
              Please enter a valid email address for shipping updates.
            </div>
          </div>

          <div class="mb-3">
            <label for="streetname">Street</label>
            <input type="text" class="form-control" name="streetname" placeholder="1234 Main St" required>
            <div class="invalid-feedback">
              Please enter your shipping address.
            </div>
          </div>



          <div class="mb-3">
              <label for="price">Country </label>
              <input type="text" class="form-control" name="country_id"/>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>


            <div class="mb-3">
                <label for="price">Zipcode </label>
                <input type="text" class="form-control" name="zipcode"/>
                <div class="invalid-feedback">
                  Please enter your shipping address.
                </div>
              </div>

          <hr class="mb-4">
          <button type="submit" class="btn btn-primary">Continue to checkout</button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>

@endsection
