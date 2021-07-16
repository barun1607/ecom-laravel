@extends('master')
@section('content')

<div class="container">
  <div id="carouselExampleControls" class="carousel slide row mt-3 mt-md-5 mb-3 mb-md-3" data-ride="carousel">
    <div class="carousel-inner">
      @foreach ($products as $item)
      <a href="detail/{{$item->id}}">
        <div class="carousel-item {{($item->id == 1) ? 'active' : ''}}">
          <img class="img-fluid img-height" src="{{$item->gallery}}">
          <div class="carousel-caption carousel-caption-color">
            <h1>{{$item->name}}</h1>
            <p>{{$item->description}}</p>
          </div>
        </div>
      </a>
      @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<div class="container">
  <div class="row mb-3 mb-md-3">
    <h2>Trending</h2>
  </div>
  <div class="row mb-3 mb-md-3">    
    @foreach ($products as $item)    
    <div class="col-12 col-md-4 mt-3">
      <a href="detail/{{$item->id}}">
        <div class="img-fluid center-item">
          <img src="{{$item->gallery}}" height="250"/>
        </div>
      </a>
    </div>    
    @endforeach
  </div>
</div>
@endsection