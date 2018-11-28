
@extends('layouts.sidemenu')

@section('content')
@include('notification')

<div class="container mt-5 ml-4">
  <div class="row">
    <div class="col-sm-4">
      <h1>NEW THINGS</h1>
    </div>
  </div>
</div>


<div class="container-fluid">
  <div class="row" id="up">

    <div class="form-group">

      <form action="{{ url('/upload') }}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}

    </div>


  <div class="col-md-6 mt-5">
        Product photos (can attach more than one)
        <br />
        <br />

      <div class="custom-file">
        <input type="file" class="custom-file-input" name="photos[]" id="inputGroupFile02" multiple>
        <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
      </div>
      <br />
      <br />


      <label for="exampleInputText1">Product Title</label>
      <br />
      <input type="text" class="form-control" name="name" />
      <br />
      <br />
      <label for="exampleTextArea">Description</label>
      <br />
      <textarea class="form-control" maxlength="300" name="description" rows="2"></textarea>
      <br />
      <label for="exampleInputText2">Tags</label>
      <br />
      <input type="text" class="form-control" name="Tag1" />
      <br />
      <input type="text" class="form-control" name="Tag2" />
      <br />
      <label for="exampleSelect2">Select Category</label>
      @foreach($category_list as $category)
      <div class="form-check">
        <label class="form-check-label">
          <input type="radio" class="form-check-input" name="optcategory" value="{{$category->id}}">{{$category->name}}
        </label>
      </div>

      @endforeach

    </div>
  <div class="col-md-6 mt-5">
    Select Color
    <br />
    <br />
      @foreach($colors as $color)
        <div class="form-check">
          <label class="form-check-label">
          <input type="radio" class="form-check-input" name="optcolor" value="{{$color->id}}">{{$color->name}}
          </label>
        </div>

      @endforeach
    <br />
    <br />
    <br />
    <br />
     <label for="exampleSelect4">Price</label>
      <br />
      <input type="number" value="0" min="0" step="0.01" data-number-to-fixed="2" data-number-stepfactor="100" class="form-control" name="price" id="c1" />
      <br />
      <br />
      <button type="submit" class="btn btn-primary" value="Upload">Upload</button>
      <br />
      <br />
    </form>
  </div>
</div>

</div>


@endsection
