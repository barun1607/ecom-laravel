@extends('master')
@section('content')
<div class="container">
  <div class="row mt-5 mb-5">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Expense</th>
          <th scope="col">Amount</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Price</td>
          <td>Rs. {{$total}}</td>
        </tr>
        <tr>
          <td>Taxes</td>
          <td>Rs. {{0}}</td>
        </tr>
        <tr>
          <td>Delivery</td>
          <td>Rs. {{300 }}</td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <td><b>Total</b></td>
          <td><b>Rs. {{$total + 300}}</b></td>
        </tr>
      </tfoot>
    </table>
  </div>
  <div class="row mb-5">
    <div class="col-md-6">
      <h2>Enter details</h2>
      <form action="order" method="POST">
        @csrf
        <input type="hidden" name="total" value="{{$total + 300}}">
        <div class="form-group">
          <label for="payment">Payment method</label>
          <select class="form-control" id="payment" name="payment">
            <option value="card">Card</option>
            <option value="bank">Online banking</option>
            <option value="cash">Cash on delivery</option>
          </select>
        </div>
        <div class="form-group">
          <label for="address">Address</label>
          <textarea class="form-control" id="address" rows="3" name="address" placeholder="Enter your address" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>
@endsection