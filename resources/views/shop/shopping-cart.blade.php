@extends('layouts.master')

@section('title')
view Shopping Cart
@endsection

@include('partials.header')

@section('content')


@if(Session ::has ('Cart'))
<div class="row">
  <div class="col-md-4 col-md-offest-4">


    <ul class="list-group">
      @foreach($products as $product)
  <li class="list-group-item">
<span class="badge badge-info">{{ $product['Qty']}}</span>
<strong>{{ $product['item']['title']}}</strong>
<span class="badge badge-success">{{ $product['price']}}</span>
<div class="btn-group">
<button button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
Actions
</button>
<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
  <li><a href="{{route('product.reduceByOne',['id'=> $product['item']['id']]) }}">Remove One</a></li>
  <li><a href="{{route('product.remove',['id'=> $product['item']['id']]) }}">Remove All</a></li>
</ul>
</div>

  </li>




@endforeach
</ul>

</div>
</div>
<hr>

<div class="row">
  <div class="col-md-4 col-md-offest-4">


<strong>Total : ${{ $totalprice}}</strong>
</div>
</div>


<hr>

<div class="row">
  <div class="col-md-4 col-md-offest-4">


    <a href="{{ route('checkout') }}" class="btn btn-success" type="button">
CheckOut
</a>
</div>
</div>
@else

<div class="row">
  <div class="col-md-4 col-md-offest-4">

<h2> No Items In cart </h2>
</div>
</div>
@endif



@endsection
