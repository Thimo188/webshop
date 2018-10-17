
@extends('layouts.sidemenu')

@section('content')
@include('notification')

<form action="/upload" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    Product name:
    <br />
    <input type="text" name="name" />
    <br />
    Product descirption:
    <br />
    <input type="text" name="description" />
    <br /><br />
    Product photos (can attach more than one):
    <br />
    <input type="file" name="photos[]" multiple />
    <br /><br />
    <input type="submit" value="Upload" />

</form>

<img src="{{asset('storage/product/kunst3.PNG')}}">

@endsection
