@extends('master')
@section('content')

<div class="container">
  <div class="row mt-3 mb-4">
    <h1>Cart</h1>
  </div>
  <div class="row mb-5">
    @foreach($products as $item)
    <div class="col-md-4 mt-3">
      <a href="detail/{{$item->id}}">
        <img src="{{$item->gallery}}" width="200" class="img-fluid">
      </a>
    </div>
    <div class="col-md-4 mt-3 center-item">
      <div>
        <h3>{{$item->name}}</h3>
        <p>{{$item->description}}</p>
        <h2>Rs. {{$item->price}}</h2>
      </div>
    </div>
    <div class="col-md-4 mt-3 center-item">
      <a href="remove-cart/{{$item->cart_id}}" class="btn btn-outline-danger">Remove from cart</a>
    </div>
    @endforeach
  </div>
  <div class="row mb-5">
    <div class="col-md-4 offset-md-8 center-item">
      <a href="checkout" class="btn btn-lg btn-success">Checkout</a>
    </div>   
  </div>
</div>

@endsection