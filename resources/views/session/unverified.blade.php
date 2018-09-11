@extends('layouts.master')
@section('content')
  <hr>
  
 <div class="contents">
   
     
        <hr>
        <div class="mainboddy"> 
             <div class="navsbarr">

              @foreach($users as $userr)


               <h3> Welcome to One Love website {{$userr->name}}.<br>Your account isn't activated.</h3>
                
               <h3>Please check your email to <strong>Activate</strong> your account.</h3>
                
               
              </div>
              @endforeach
        </div>


   
     
       
      
     
 </div>

@endsection