<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clocking App</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
   
   <!-- Styles -->
   <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
@extends('layout.app')
@section('content') 
 
<div class="container">
@if(auth()->user()->role == 'admin')
  <div class="row">
      <div class="col-md-6 offset-md-3" style="margin-top:50px">
        <div class="d-flex justify-content-between align-items-center ">
          <h1>Add User</h1> 
          <a href="/users"  >X</a>

        </div>
      
      <hr>

    <form action ="{{route('auth.create')}}" method="post">
      @csrf
      <div class="results">
         @if(Session::get('success'))
           <div class='alert alert-success'>
               {{Session::get('success')}}
           </div>
         @endif
          @if(Session::get('fail'))
           <div class='alert alert-danger'>
               {{Session::get('fail')}}
           </div>
         @endif
      </div>
    <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" placeholder="Enter Name" name="name" value="{{old('name')}}">
     <span class="text-danger">@error('name'){{$message}} @enderror</span>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" placeholder="Enter email" name="email" value="{{old('email')}}" >
     <span class="text-danger">@error('email'){{$message}} @enderror</span>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" placeholder="Password" name="password" >
    <span class="text-danger">@error('password'){{$message}} @enderror</span>
  </div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" value="admin" name="role">
  <label class="form-check-label" >Admin</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio"  value="user" name="role" checked>
  <label class="form-check-label" >User</label>
</div>
<hr>
<div class="form-group">
   <a class="btn btn-secondary" href="/users">close</a>
   <button type="submit" class="btn btn-primary">Add User</button>
</div>

<form>
  
@else
<div class="mt-5 text-center text-danger">
   <h4>UNAUTHORIZED PAGE !!! CONTACT ADMIN FOR ASSISTANCE</h4>
</div>
@endif
</div>
@endsection

</body>
</html>