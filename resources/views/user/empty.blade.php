@extends('layouts.master')
@section('content')
<div class="contents">
    <div class="containers">
       
          <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body">
                	<div class="notify">
                		<div class="panel-heading">User Dashboard
                    </div>
                		
          			    
          			      <div class="panel-body" id="contentse">
           
                					<h6><a href="/stageoneuser">Stage-1</a></h6>
                          <hr>
                					 <h6><a href="/stagetwouser">Stage-2</a></h6>
                           <hr>
                					 
                          <h6><a href="/rejecteduser">Rejected</a> </h6>
                          <hr>
                          <h6><a href="/accepteduser">Accepted</a> </h6>
                          <hr>
                					
                      </div>
                	</div>

              
                	<div class="notifycontent">
                		
                			<div class="panel-heading">Proposals</div>
              	      <div class="panel-body" id="contentss">
                            <h1>You dont have a proposal yet,<br> want to create one? </h1>
                            <button class="btn btn-success" id="bton">
                              <a href="/proposal" id="buton">
                                 Create Proposal
                               </a>
                             </button>
                      </div>
                		</div>
                	</div>

                </div>
          </div>

    </div>
</div>



@endsection