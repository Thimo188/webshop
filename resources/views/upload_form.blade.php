@extends('layouts.sidemenu')

@section('content')
<link rel='stylesheet' href='/css/style.css'>


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


    <div class="col-md-6 mt-4">

      <label for="iputGroupFile02">Product photos</label>
      <br />
        <div class="upload_form">
        (can attach more than one)
        </div>
        <br />
        <div class="custom-file">
          <input type="file" name="photos[]" id="inputGroupFile02" multiple>
        </div>
        <small class="text-secondary">{{ $errors->first('photos') }}</small>


        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
          <label for="exampleInputText1">Product Name</label>
          <br />
          <input type="text" class="form-control" name="name" value="{{ old('name') }}" />

          <small class="text-secondary">{{ $errors->first('name') }}</small>
        </div>


        <label for="exampleTextArea">Description</label>
        <br />
        <div class="upload_form">
        How would you describe your product?
        </div>
        <br />
        <textarea class="form-control" maxlength="300" name="description" rows="2" value="{{ old('description')}}">{{ old('description')}}</textarea>
        <small class="text-secondary">{{ $errors->first('description') }}</small>
        <br />


        <label for="exampleInputText2">Tags</label>
        <br />
        <div class="upload_form">
        How can others find your product?
        </div>
        <br />
        <input type="text" class="form-control" name="Tag1" value="{{ old('Tag1')}}" />
        <small class="text-secondary">{{ $errors->first('Tag1') }}</small>

        <br />
        <input type="text" class="form-control" name="Tag2" value="{{ old('Tag2')}}" />
        <br />
        <input type="text" class="form-control" name="Tag3" value="{{ old('Tag3')}}" />
        <br />
    </div>



    <div class="col-md-6 mt-4">

      <div class="form-group{{ $errors->has('color1') ? ' has-error' : '' }}">
        Select Color
        <br />
        <div class="upload_form">
        Which colors do you see in your product?
        </div>
        <br />
        <div class="form-group">
         <select class="form-control" name="color1">
           @foreach($colors as $color)
              <option value="{{$color->color_id}}">{{$color->name}}</option>
              @endforeach
        </select>
        <small class="text-secondary">{{ $errors->first('color1') }}</small>
      </div>
        <br />
          <select class="form-control" name="color2">
            @foreach($colors as $color)
              <option value="{{$color->color_id}}">{{$color->name}}</option>
              @endforeach
          </select>
       <br />
        <select class="form-control" name="color3">
          @foreach($colors as $color)
            <option value="{{$color->color_id}}">{{$color->name}}</option>
            @endforeach
        </select>
      </div>
      <br />

        <label for="exampleSelect2">Select Category</label>
        <br />
        <div class="upload_form">
        Choose the category that is most suitable to your product
        </div>
        <br />
        @foreach($category_list as $category)
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="category" value="{{$category->id}}">{{$category->name}}
            </label>
          </div>

          @endforeach
        <small class="text-secondary">{{ $errors->first('category') }}</small>
        <br />


        <label for="exampleSelect4">Price</label>
        <div class="upload_form">
        What is your product worth?
        </div>
        <br />
        <input type="number" value="0" min="0" step="0.01" data-number-to-fixed="2" data-number-stepfactor="100" class="form-control" name="price" id="c1" value="{{ old('price')}}" />
        <small class="text-secondary">{{ $errors->first('price') }}</small>
        <br />
          <button type="submit" class="btn btn-primary" style="float:right;" value="Upload">Upload</button>
        <br />
        <br />
      </form>

    </div>
  </div>
</div>


@endsection
