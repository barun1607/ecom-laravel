<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  
  <title>Login</title>
</head>
<body>
  <div class="container">
    <div class="col-md-4 center-form">
      <form class="form-style" action="login" method="POST">
        <h2>Login</h2>
        @csrf
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
          @error('email')
            <small class="alert-danger">{{$message}}</small>
          @enderror
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
          @error('password')
            <small class="alert-danger">{{$message}}</small>
          @enderror
        </div>
        @if(isset($fail))
          <small class="alert-danger">{{ $fail ? 'Invalid ussername or password' : ''}}</small><br><br>
        @endif
        <button type="submit" class="btn btn-primary">Login</button>
      </form>
    </div>
  </div>
  
</body>
<style>
  .center-form {
    margin-left: 50%;
    transform: translate(-50%);
    margin-top: 30vh;
  }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
</html>


