{!! csrf_field()  !!}
<div class="form-group">
  <label for="street">street</label>
  <input type="text" class="form-controle" name="street" id="street" placeholder="Input street" value="{{old('street')}}" required>
</div> 
<div class="form-group">
  <label for="city">City</label>
  <input type="text" class="form-controle" name="city" id="city" placeholder="Input....." value="{{old('city')}}" required>
</div> 
<div class="form-group">
  <label for="zip">zip / Post Code</label>
  <input type="text" class="form-controle" name="zip" id="zip" placeholder="Input Zip" value="{{old('zip')}}" required>
</div> 
<div class="form-group">
  <label for="country">Country</label>
  <select class="form-controle" name="country" id="country" required>
    {{--@foreach (\App\Http\Utilities\Country::all() as $country)--}}
{{--@foreach (\App\Http\Utilities\Country::all()
as 
$country => $code)--}}
{{--@foreach ($countries as $country => $code)--}}
@foreach ($countries::all() as $country => $code)
<option value="{{$code}}">{{$country}}</option> 
@endforeach
  </select>
</div> 
<div class="form-group">
  <label for="state">State</label>
  <input type="text" class="form-controle" name="state" id="state" placeholder="Input State" value="{{old('state')}}" required>
</div> 
<div class="form-group">
  <label for="price">Selling Price</label>
  <input type="text" class="form-controle" name="price" id="price" placeholder="Input Price" value="{{old('price')}}" required>
</div> 
<div class="form-group">
  <label for="description">Home Description</label>
  <textarea class="form-controle" name="description" id="description" placeholder="Input Description" required>{{old('description')}}</textarea>
</div> 
 {{--<div class="form-group">
  <label for="photos">Selling Price</label>
  <input type="file" class="form-controle" name="photos" id="photos" required >
 </div>--}}
<div class="form-group">
  <button type="submit" class="btn btn-primary">Create Banner</button>
</div>