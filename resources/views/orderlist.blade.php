@extends('master')
@section('content')

<div class="container">
  <div class="row mt-3 mb-4">
    <h1>Orders</h1>
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
        <p>Rs. {{$item->price}}</p>
        <p>Address: {{$item->address}}</p>
        <p>Status: {{$item->status}}</p>
      </div>
    </div>
    <div class="col-md-4 mt-3 center-item">
      <a href="cancel-order/{{$item->id}}" class="btn btn-outline-danger">Cancel order</a>
    </div>
    @endforeach
  </div>
</div>

@endsection