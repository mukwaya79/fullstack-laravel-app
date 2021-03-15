@extends('layout.app')


@section('content') 
 @if(auth()->user()->role == 'admin')
 <div class="container">
  <div class="row">
    <div class="col-md-8 offset-md-2" style='margin-top:20px'>
      <div class="d-flex justify-content-between align-items-center">
        <h1>Users</h1>
       <a class="btn btn-success" href="/register">+ Add User</a>
      </div>
      <br>
      <table class='table table-hover'>
        <thead class="bg-primary">
          <th>#</th>
          <th>Name</th>
          <th>Email</th>
          <th>Role</th>
          <th>Created</th>
          <th>Action</th>
        </thead>
         <tbody>
           @foreach ($list as $item)
               <tr>
                 <td> {{$item->id}}</td> 
                 <td> <a href="/edit/{{$item->id}}">{{$item->name}}</a></td>
                 <td> {{$item->email}}</td>
                 <td> {{$item->role}}</td>
                 <td> {{date('d/M/Y',strtotime($item->created_at))}}</td>
                 <td><a class="btn btn-danger"  href="/delete/{{$item->id}}"
                  onclick="return confirm('please confirm you wish to delete this user')">DELETE</a></td>
               </tr>
           @endforeach
         </tbody>
        
            
      
      </table>
    </div>
  </div>
  </div>
  @else
  <div class="mt-5 text-center text-danger">
   <h4>UNAUTHORIZED PAGE !!! CONTACT ADMIN FOR ASSISTANCE</h4>
   </div>
  @endif

@endsection