<?php
  use App\Http\Controllers\ProductController;
  $total = 0;
  if(Session::has('user')) {
    $total = ProductController::cartItem();
  }  
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: beige !important;">
  <a class="navbar-brand" href="/">Laravel Ecom</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="/">Home</a>
      </li>
      @if(Session::has('user')) 
        <li class="nav-item">
          <a class="nav-link" href="order-list">Orders</a>
        </li>
      @endif
    </ul>
    {{-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> --}}
    <ul class="navbar-nav">
    @if($total != 0)    
      <li class="nav-item">
        <a class="nav-link" href="cart-list">Cart({{$total}})</a>
      </li>    
    @endif
    @if(Session::has('user')) 
      <li class="nav-item">
        <a class="nav-link" href="logout">Logout</a>
      </li>
    @else
      <li class="nav-item">
        <a class="nav-link" href="login">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register">Register</a>
      </li>
    @endif
    </ul>
  </div>
</nav>