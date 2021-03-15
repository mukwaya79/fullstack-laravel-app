@extends('layout.app')

@section('content') 
 <div class="container">
    @if(auth()->user()->role == 'admin')
  <div class="row">
      <div class="col-md-6 offset-md-3" style="margin-top:50px">
        <div class=" text-center ">
          <h1>Edit User</h1>
        </div>
      
      <hr>

    <form action="{{route('update')}}" method="post">

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
       
       <input type="hidden" name="cid" value="{{$info->id}}"/>

    <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" placeholder="Enter Name" name="name" value="{{$info->name}}">
     <span class="text-danger">@error('name'){{$message}} @enderror</span>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" placeholder="Enter email" name="email" value="{{$info->email}}" >
     <span class="text-danger">@error('email'){{$message}} @enderror</span>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" placeholder="Password" name="password" value="{{$info->password}}">
    <span class="text-danger">@error('password'){{$message}} @enderror</span>
  </div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" value="admin" name="role" value="{{$info->role}}">
  <label class="form-check-label" >Admin</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio"  value="user" name="role"  value="{{$info->role}}">
  <label class="form-check-label" >User</label>
</div>
<hr>
<div class="form-group">
   
   <button type="submit" class="btn btn-success">Save</button>
</div>

<form>
   @else
   <div class="mt-5 text-center text-danger">
   <h4>UNAUTHORIZED PAGE !!! CONTACT ADMIN FOR ASSISTANCE</h4>
   </div>
  @endif
</div>
  
@endsection