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
          <input type="file" name="photos[]" id="inputGroupFile02" multiple>
        </div>

        <br />
        <br />


        <label for="exampleInputText1">Product Name</label>
        <br />
        <input type="text" class="form-control" name="name" value="{{ old('name') }}" />
        <br />
        <br />
        <label for="exampleTextArea">Description</label>
        <br />
        How would you describe your product?
        <br />
        <textarea class="form-control" maxlength="300" name="description" rows="2" value="{{ old('description')}}">{{ old('description')}}</textarea>
        <br />
        <label for="exampleInputText2">Tags</label>
        <br />
        How can others find your product?
        <br />
        <input type="text" class="form-control" name="Tag1" value="{{ old('Tag1')}}" />
        <br />
        <input type="text" class="form-control" name="Tag2" value="{{ old('Tag2')}}" />
        <br />
        <input type="text" class="form-control" name="Tag3" value="{{ old('Tag3')}}" />
        <br />
      </div>



      <div class="col-md-6 mt-5">

        <label for="exampleSelect2">Select Category</label>
        <br />
        Choose the category that is most suitable to your product
        @foreach($category_list as $category)
        <div class="form-check">
          <label class="form-check-label">
            <input type="radio" class="form-check-input" name="category" value="{{$category->id}}">{{$category->name}}
          </label>
        </div>
        @endforeach

        <br />

        Select Color
        <br />
        Which colors do you see in your product?
        <br />
        <br />
        <select class="form-control" name="color">
          @foreach($colors as $color)
          <option value="{{$color->color_id}}">{{$color->name}}</option>
          @endforeach
        </select>
        <br />
        <br />
        <br />
        <br />
        <label for="exampleSelect4">Price</label>
        <br />
        <input type="number" value="0" min="0" step="0.01" data-number-to-fixed="2" data-number-stepfactor="100" class="form-control" name="price" id="c1" value="{{ old('price')}}" />
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
