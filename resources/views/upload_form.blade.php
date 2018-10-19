
@extends('layouts.sidemenu')

@section('content')
@include('notification')

<div class="container mt-5 ml-4">
  <div class="row">
    <div class="col-sm-4">
    <h1>NEW THINGS</h1>
  </div>
  <div class="col-sm-8">
    <i class="fas fa-pencil-alt fa-2x"></i>
  </div>
</div>
</div>







<div class="container-fluid">
  <div class="row" id="up">

    <div class="form-group">

      <form action="{{ url('/upload') }}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}

        <div class="col-md-6 mt-5">

        </div>
      </div>


      <div class="col-md-6 mt-5">
        Product photos (can attach more than one)
        <br />
        <br />

        <div class="custom-file">
          <input type="file" class="custom-file-input" name="photos[]" id="inputGroupFile02">
          <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
        </div>
        <br /><br />


      <label for="exampleInputText1">Product Title</label>
      <br />
      <input type="text" class="form-control" name="name" />
      <br />
      <label for="exampleTextArea">Description</label>
      <br />
      <textarea class="form-control" name="description" rows="2"></textarea>
      <br />
      <label for="exampleSelect2">Select Tags</label>
      <select multiple class="form-control" id="exampleSelect2">
        <option>Black/White</option>
        <option>Abstract</option>
        <option></option>
      </select>
        <br />

        <label for="c1">Price</label>
        <br />
        <input type="number" value="0" min="0" step="0.01" data-number-to-fixed="2" data-number-stepfactor="100" class="form-control" name="price" id="c1" />
      <br/><br>
      <button type="submit" class="btn btn-primary" value="Upload">Upload</button>
      <br /><br />
</div>

    </form>
</div>

</div>


@endsection
