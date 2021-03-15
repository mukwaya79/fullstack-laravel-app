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
    
      <nav class="navbar navbar-expand-lg navbar-light"  style="background-color: #2ed573;">
      
      <a class="navbar-brand font-weight-bold" href='{{route('dashboard')}}' >Clocking <h6>{{auth()->user()->email}}({{auth()->user()->role}})</h6></a>
      
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    
   <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('report')}}">Report</a>
      </li>

        @if(auth()->user()->role == 'admin')

        <li class="nav-item">
          <a class="nav-link font-weight-bold" href="{{route('users')}}">Users</a>
        </li>
         @endif
       <li class="nav-item">
        <a class="nav-link font-weight-bold" href="{{route('logout')}}">Logout</a>
      </li>
    </ul>
    
  </div>
</nav>
  <div class="container">
       @yield('content')
    </div>
</body>
</html>