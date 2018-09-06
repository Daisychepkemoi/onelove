@extends('layouts.master')
@section('content')
<hr>
 <div class="contents">
    <div class="containers">
       <div class="navsbars">

<div class="col-sm-8 blog-main">
	<h1>One Love</h1>
	<hr>

	
<div class="col-ml-8">
  <h1>Log In</h1>


<form method="POST" action="/login" >
    {{ csrf_field() }}
  <div class="form-group">
    <label for="email">Email :</label>
    <input type="email" class="form-control" id="email" required="" placeholder="email"  name="email" />
    
  </div>
  <div class="form-group">
    <label for="password">Password:</label>
   <input id="password" name="password" type="password" placeholder="password" required="" 
   class="form-control" />
  </div>
  
  <button type="submit"  class="btn btn-primary">Login</button>
  @include('layouts.errors')
</form>
</div>
</div>
</div>
</div>

@endsection
