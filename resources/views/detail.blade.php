@extends('master')
@section('content')
  <div class="container">
    <div class="row mt-5 mb-5">
      <div class="col-md-6 mt-3 mb-3">
        <img src="{{$product->gallery}}" class="img-fluid">
      </div>
      <div class="col-md-6 mt-3 mb-3">
        <h2>{{$product->name}}</h2>
        <h3>Rs. {{$product->price}}</h3>
        <p>{{$product->description}}</p> 
        <form action="/add-to-cart" method="post">
          @csrf
          <input type="hidden" name="product_id" value="{{$product->id}}">
          <button type="submit" class="btn btn-outline-primary">Add to cart</button>   
        </form>            
        <button class="btn btn-success mt-2">Buy now</button> 
      </div>
    </div>
  </div>
@endsection