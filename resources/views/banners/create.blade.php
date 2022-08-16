@inject('countries', '\App\Http\Utilities\Country')
@extends('layout')

@section('content')
<div class="jumbotron">
    <h1 class="display-4">Selling yours home?</h1>
<form action="{{route('banners.store')}}" method="post" enctype="multipart/form-data" role="form" >
 @include('banners.form')
</form>
  @if (count($errors) > 0)
      <div class="alert alert-danger">
        <ul>
          @foreach($errors->all() as $error)
          <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
  @endif
  @include('sweetalert::alert')
  </div>
@stop