@extends('layouts.master')

@section('title')
view Shopping Cart
@endsection

@include('partials.header')

@section('content')



<div class="row">
  <div class="col-md-4 col-md-offest-4">

<h4>  Total : ${{ $total }}</h4>
<div id="charge-error" class="alert
{{ !Session ::has('error') ? 'hidden': 'alert-danger' }}">
 {{ Session ::has('error')}}

</div>
<form action="{{ route('checkout')}}" method="post" id="checkout-form">
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="">Name</label>
      <input type="text" name="name" class="form-control" id="">
    </div>
    <div class="form-group col-md-12">
      <label for="address_zip">Address</label>
      <input type="text" name="address" class="form-control" id="address_zip">
    </div>
  </div>
  <div class="form-group">
    <label for="card-name">Card Holder Name</label>
    <input type="text" class="form-control" id="card-name" placeholder="Card Holder Name">
  </div>
  <div class="form-group">
    <label for="card-number">Credit Cart Number</label>
    <input type="number" class="form-control" id="card-number" placeholder="#### #### ### ###">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="card-expiry-month">Expiration Month</label>
      <input type="number" class="form-control" id="card-expiry-month">
    </div>
    <div class="form-group col-md-6">


      <label for="card-expiry-year">Expiration Year</label>
      <input type="number" class="form-control" id="card-expiry-year">

    </div>
    <div class="form-group col-md-12">
      <label for="card-cvc">CVC</label>
      <input type="text" class="form-control" id="card-cvc">
    </div>
  </div>

  <button type="submit" class="btn btn-primary"> Book Now </button>
  {{ csrf_field() }}
</form>

</div>
</div>

@endsection



@section('scripts')

<script type="text/javascript"    src="https://js.stripe.com/v2/"></script>
<script type="text/javascript"   src="https://js.stripe.com/v3/"></script>
<script  type="text/javascript"   src="{{ URL::to('src/js/checkout.js')}}"></script>


@endsection
