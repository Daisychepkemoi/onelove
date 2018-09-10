@extends('layouts.master')
@section('content')
<div class="contents">
    <div class="containers">
       <!-- <div class="navsbars"> -->
<div class="panel-group">
 
      <div class="panel-body">
      	<div class="notify">
      		<div class="panel-heading">Panel </div>
      		
			    
			      <div class="panel-body" id="contentse">
      					<h6><a href="/newproposals">New Proposals</a></h6>
      					<hr>
      					<h6><a href="/stageoneuser">Stage-1</a></h6>
      					<hr>
      					
                 <h6><a href="/stagetwouser">Stage-2</a><hr></h6>
      					 <h6><a href="/accepteduser">Accepted</a><hr></h6>
      					 <hr>
      					<h6><a href="/rejecteduser">Rejected</a> <hr></h6>
      				
      					
      		
      		</div>
      	</div>

      
      	<div class="notifycontent">
      		 @foreach ($propos as $propose)
           @if($propose->stage == 'stageone')

            <div class="panel-heading"><h2 id="titl">Stage-1  Proposal</h2> </div>
            @elseif($propose->stage == 'stagetwo')
            <div class="panel-heading"> <h2 id="titl">Stage-2  Proposal</h2></div>
            @elseif($propose->stage == 'Accepted')
            <div class="panel-heading"> <h2 id="titl">Accepted  Proposal</h2></div>
            @elseif($propose->stage == '')
            <div class="panel-heading"><h2 id="titl">Unreviewed  Proposal</h2></div>
             @else($propose->stage == 'reject')
            <div class="panel-heading"><h2 id="titl">Rejected  Proposal</h2></div>
            @endif
      		
      			
      			<div class="panel-body" id="contentss">
               
             
                     <div class="prope">
                    <div class="prop">


                       
                  
                    <h2 id="bodyy">{{$propose->title}} Proposal</h2>
                      <h3>Introduction</h3>
                    <p>It's written by  {{$propose->Submitted_by}} for {{$propose->organization}}  organization located in {{$propose->address}} whose contact address is : {{$propose->phone}} </p>
                     <h3>Summary</h3>
                     <p>  {{$propose->Summary}}</p>
                    <h3>Background Information</h3>.
                    <p> {{$propose->Background}}</p>
                    <h3>Activities</h3>
                    <p>  {{$propose->activities}}</p>
                    <h3>Estimated Budget</h3>
                    <p>Ksh :  {{$propose->budget}}</p>
                   
                    
                
                   
                   
                    </div>

                    </div>
                 
                
               
                @endforeach  

      		<button class="btn btn-primary"> <a href="/userback" id="buton">Back</a></btn> 




      			</div>
      		</div>
      	</div>

    
    </div>

    </div>
</div>



@endsection