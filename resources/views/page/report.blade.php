@extends('layout.app')

@section('content')

<div class="container">
  <div class="row mt-5">
    <div class="col-md-4 ">
      <h2 class='font-weight-bold'>users</h2>
       @if(auth()->user()->role == 'admin')
        @foreach ($list as $item)
          <div class ='card'>
            <div class='card-body '>
            <h3 class="card-title">{{$item->role}}</h3>
            <h3 class="card-content">{{$item->email}}</h3>
            </div>
          </div>  
        @endforeach
       @else
       <div class ='card'>
        <div class='card-body '>
          <h3 class="card-title">{{auth()->user()->role}}</h3>
          <h3 class="card-content">{{auth()->user()->email}}</h3>
        </div>
      </div>  
      @endif
    </div>
    <div class="col-md-8 ">
       <h2 class='font-weight-bold'>Logs for </h2>
         <table class='table table-striped'>
        <thead class="bg-default">
          
          <th>Date</th>
          <th>Time in</th>
          <th>Time out</th>  
        </thead>
        <tbody> 
        
          @foreach ($info as $list )
          <tr>
            <td>{{$list->date}}</td>
            <td>{{$list->time_in}}</td>
            <td>{{$list->time_out}}</td>
          </tr>
             
          @endforeach
  
        </tbody>
         </table>
      </div>
    </div>
  </div>
  @endsection