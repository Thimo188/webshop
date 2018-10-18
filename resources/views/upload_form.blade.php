
@extends('layouts.sidemenu')

@section('content')
@include('notification')

<div class="container-fluid">
  <div class="row" id="up">

    <div class="col-sm-6 mt-5">
    </div>

<div class="col-sm-6 mt-5">

    <div class="form-group">

      <form action="/upload" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      <label for="exampleInputText1">Product name</label>
      <br />
      <input type="text" class="form-control" name="name" />
      <br />
      <label for="exampleTextArea">Product description</label>
      <br />
      <textarea class="form-control" name="description" rows="3"></textarea>
      <br />
      <label for="exampleSelect2">Select Tags</label>
      <select multiple class="form-control" id="exampleSelect2">
        <option>Photography</option>
        <option>3DArt</option>
        <option>Illustrations</option>
      </select>
      <br />
      Product photos (can attach more than one):
      <br />
      <input type="file" name="photos[]" multiple />
      <br /><br />
      <input type="submit" value="Upload" />

    </form>

<img src="{{asset('storage/product/kunst3.PNG')}}">
</div>
</div>

@endsection
