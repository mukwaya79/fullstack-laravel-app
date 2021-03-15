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
    <div class="container">
       <div class="row">
    <div class="col-md-4 offset-md-4" style="margin-top:50px">
     
       <h1 class='text-center'> Sign In</h1> <br>
       
    <form action ="{{route('auth.logincheck')}}" method ="post">
        @csrf
        @if(Session::get('fail'))
           <div class='alert alert-danger'>
               {{Session::get('fail')}}
           </div>
         @endif
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" name='email' placeholder="Enter email" value="{{old('email')}}">
    <span class="text-danger">@error('email'){{$message}} @enderror</span>
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name='password' placeholder="Password"value="{{old('password')}}">
    <span class="text-danger">@error('password'){{$message}} @enderror</span>
  </div>
  
  <button type="submit" class="btn btn-success float-right">Login to Clocking</button>
</form>
    
  </div>
      
</body>
</html>