@extends('layout.app')

@section('content')
 <div class="container">
  <div class="row">
    <div class="col-md-3 offset-md-4">
       
       <form style="margin-top:80px" action="{{route('timelog.dashboard')}}" method="post">
          @csrf
        <div class="form-group ">
         <div>
            <input type="text" name="time_in" readonly class="form-control-plaintext" style="font-size: 45px" value="<?php 
            date_default_timezone_set("Africa/Kampala");  
            echo date('H:i')." "."Hrs"; ?>">
          </div>
          <div>
            <input type="text" name="date" readonly class="form-control-plaintext" name="date" style="font-size: 18px" value="<?php echo date('D, d/M/y');?>">
          </div>
        <button type="submit" class="btn btn-success" style="text-align:center;margin-top:5px">Time in</button>
        </form>
    </div>
  </div>
   
   
  </div>

@endsection