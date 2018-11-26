@extends ('layouts.sidemenu')

@section('content')
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

</div>

<div class="container main">
    <div class="row">
      <div class="col-md-4 offset-md-3">
        <h4 class="mb-3">Change E-mail</h4>
				<form class="form-horizontal" method="POST" action="{{ route('editEmail') }}">
          @csrf
        <div class="form-group">
          <label for="new-mail">Please enter your new email address</label>
          <input id=new-email type="text" class="form-control" name="new-email" required/>
				</div>


        <button type="submit" class="btn btn-primary">Confirm</button>
      </form>


      </div>
    </div>
	</div>



@endsection
