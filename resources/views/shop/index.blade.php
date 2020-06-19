@extends('layouts.master')

@section('title')
Laravel Shopping Cart
@endsection

@include('partials.header')

@section('content')

@if(Session ::has('success'))

<div class="row">
<div id="charge-message"  class="col-sm-6 col-md-4">


  <div class="alert alert-success" role="alert">
    {{ Session ::get('success')}}
</div>

</div>
</div>




@endif


@foreach($products->chunk(3) as $productchunk )

<div class="row">

  @foreach( $productchunk as $product )

<div class="col-sm-6 col-md-4">
<div class="card" style="width: 15rem;">
  <img src="{{ $product->imagepath }}" class="card-img-top img-thumbnail imagepro"    width="100px" height="100px" alt="...">
  <div class="card-body">
    <h5 class="card-title">{{ $product->title }}</h5>
    <p class="card-text">{{ $product->description}}</p>

   <a class="card-link" style="border: 1px solid black;padding:2px ; margin :2px "> <b>${{ $product->price }}</b></a>
      <a class="card-link btn btn-primary btn-sm" href="{{ route('product.addToCart',['id'=>$product->id])}}">  Add To Cart   <span>   </span>
       <i class="fa fa-cart-plus" aria-hidden="true"></i> </a>


  </div>
</div>

</div>
@endforeach
</div>


@endforeach
<div class="row" style="text-align:'center';">
<center>{{$products->links()}}</center>
</div>











@endsection
