<!DOCTYPE html>
<html>
<head>
 <title>OneLove</title>
   
  <!-- <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">  -->
  <link href="{{ asset('css/proposal.css') }}" rel="stylesheet" type="text/css" >
  <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" >
  <script type="text/javascript" src="{{ asset('js/proposal.js')}}"></script>
  <script type="text/javascript" src="{{ URL::to('js/proposal.js') }}"></script>

 
 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

  <body>

    

        @include('partials.header')
        <hr>

        @yield('content')
      
        @include('partials.footer') 
    

    
  

</body>
</html>