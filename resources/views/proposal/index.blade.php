


@extends('layouts.master')
@section('content')
  <hr>
  
 <div class="contents">
   
      <div class="main"> 
        <hr>
        <div class="mainbody"> 
             <div class="navsbar">
               @if (session()->has('success'))
                  <div class="alert alert-info">
                      {{ session('success') }}
                  </div>
              @endif
               <h2>One Love Proposal Review Site,</h2>
               <h3>Write a Proposal and leave the rest to us  
                 <button type="button" class="btn btn-success"> 
                    <a href="/register" id="buton">
                      Register
                    </a>
                  </button>
                </h3>
              </div>
        </div>


      </div>
     
       
      
     
 </div>

 
         
    
@endsection