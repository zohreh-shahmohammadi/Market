@extends('layout')
@section('content')
   <h1>{{$banner->street}}</h1> 
   {{--<h2>{!! number_format($banner->price ) !!}</h2>--}}
   
   <h2>{{$banner->price }}</h2>
   <div class="description">
    {!! $banner->description !!}
   </div>
   <div>
      @foreach($banner->photos->chunk(2) as $set)
      @foreach($set as $photo)
      <img src="/{{$photo->thumbnail_path}}" alt="" width="100px" style="margin: 1em">
      @endforeach
      @endforeach
   </div>
   {{--<div>
      @foreach($banner->photos as $photo)
     
      <img src="/{{$photo->thumbnail_path}}" alt="" width="100px">
      @endforeach
   </div>--}}
   @if(auth()->check())
   <hr>
   <h2>Add yours Photos</h2>
<form id="addPhotosForm" action="/{{$banner->zip}}/{{$banner->street}}/photos" class="dropzone" method="POST">
  {{--or  <form id="addPhotosForm" action="{{route('store_photo_path',[$banner->zip,$banner->street])}}" class="dropzone" method="POST">--}}
   {{ csrf_field() }}
  
</form>
@endif

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>
<script>
   // Note that the name "myDropzone" is the camelized
   // id of the form.
   Dropzone.options.addPhotosForm = {
    paramName : "photo",
    maxFileSize:2,
    acceptedFile:'.jpg,.jpeg,.png,.bmp'

   };
 </script>
@endsection