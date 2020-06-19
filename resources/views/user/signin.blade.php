
@extends('layouts.master')

@section('title')
Sign In
@endsection

@include('partials.header')

@section('content')

<div class="row">
    @if($errors)
  <div class="col-md-4 col-md-offest-4">

<h1>Sign In </h1>
<div class="alert alert-danger" role="alert">

  @foreach($errors->all() as $error )
  <p> {{ $error }}</p>
  @endforeach

</div>
  @endif
<form action ="{{ route('user.signin')}}" method="post">
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
  {{ csrf_field() }}
</form>
  </div>
</div>
@endsection
