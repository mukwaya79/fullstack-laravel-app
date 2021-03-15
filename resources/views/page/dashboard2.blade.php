@extends('layout.app')

@section('content')
 <div class="container">
  <div class="row">
    <div class="col-md-3 offset-md-4">
       
       <form style="margin-top:80px" action="{{route('dashboard3')}}" method="post">
          @csrf
         // <input type='hidden' name='cid' value='id'>
        <div class="form-group ">
         <div>
            <input type="text" name="time_out" readonly class="form-control-plaintext" style="font-size: 45px" value="<?php 
            date_default_timezone_set("Africa/Kampala");  
            echo date('H:i')." "."Hrs"; ?>">
          </div>
          <div>
            <input type="text" name="date" readonly class="form-control-plaintext" name="date" style="font-size: 18px" value="<?php echo date('D, d/M/y');?>">
          </div>
        <button type="submit" class="btn btn-danger" style="text-align:center;margin-top:5px">Time out</button>
        </form>
    </div>
  </div>
   
   
  </div>

@endsection