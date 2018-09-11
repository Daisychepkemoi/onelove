@extends('layouts.master')
@section('content')
<div class="contents">
    <div class="containers">
      
        <div class="panel-group">
 
              <div class="panel-body">
              	<div class="notify">
              		<div class="panel-heading">
                      Panel
                  </div>
      		
			    
			          <div class="panel-body" id="contentse">
      					<h6><a href="/newproposals">New Proposals</a></h6>
      					<hr>
                <h6><a href="/userdrafts">Drafts</a></h6>
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
                                @if($propose->draft==1)
                               <div class="col-sm-8">
                                   <form method="POST" action="/proposal">
                                    {{ csrf_field() }}
                                        <div class="form-group">
                                          <label for="title">Title : <strong>*</strong></label>
                                          <input type="text" class="form-control" id="title" placeholder="title"  name="title" value="{{$propose->title}} " required="">
                                          
                                        </div>
                                        <div class="form-group">
                                          <label for="organization">Organization Name : <strong>*</strong></label>
                                          <input type="text" class="form-control" id="organization" placeholder="Organization Name"  name="organization" value="{{$propose->organization}}" required="">
                                          
                                        </div>

                                  
                                          <div class="form-group">
                                            <label for="address">Address: <strong>*</strong></label>
                                            <input type="text" class="form-control" id="address" placeholder="Address"  name="address" value="{{$propose->address}}" required="">
                                            
                                          </div>
                                          <div class="form-group">
                                            <label for="phone">Phone: <strong>*</strong></label>
                                            <input type="number" class="form-control" placeholder="Phone" id="phone"  name="phone" value="{{$propose->phone}}"  required="">
                                            
                                          </div>
                                           
                                          
                                          <div class="form-group">
                                            <label for="email">Email : <strong>*</strong></label>
                                            <input type="email" class="form-control" placeholder="Organization's Email" id="email" value="{{$propose->email}}"  name="email" required="">
                                            
                                          </div>
                                         <div class="form-group">
                                            <label for="Summary">Summary : <strong>*</strong></label>
                                            <textarea type="text" class="form-control" id="Summary" placeholder="Summary"  name="Summary"  required="">
                                              {{$propose->Summary}}
                                            </textarea> 
                                          </div>
                                         <div class="form-group">
                                            <label for="Background">Background : <strong>*</strong></label>
                                            <textarea type="text" class="form-control" id="Background" placeholder="Background"  name="Background"  required="">
                                              {{$propose->Background}}
                                            </textarea>
                                          </div>
                                          <div class="form-group">
                                            <label for="activities">Activities: <strong>*</strong></label>
                                            <TEXTAREA type="activities" class="form-control" id="activities" placeholder="Activities"  name="activities" required="" >{{$propose->activities}}</TEXTAREA>
                                            
                                          </div>
                                          <div class="form-group">
                                            <label form="budget">Budget : <strong>*</strong></label>
                                            <input type="number" class="form-control" id="budget"  placeholder="budget" name="budget" value="{{$propose->budget}}"  required="">
                                          </div>
                                          
                                         
                                          
                                          <div class="form-group">
                                          
                                            <input type="hidden" class="form-control" id="Submitted_by" placeholder="" value="{{$propose->Submitted_by}}" name="Submitted_by" readonly>
                                           </div>

                                          
                                          <button type="submit" name="publish" value="save" class="btn btn-primary">Submit</button> 
                                      
                                          <button type="submit" name="publish" value="editdraft" class="btn btn-primary">save changes as Draft</button> 
                                          <button type="submit" name="publish" value="editdraft" class="btn btn-danger">delete</button> 
                          
                                          @include('layouts.errors')
                                    </form>
                              </div>
                              @else
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
                                  <button class="btn btn-primary"> <a href="/userback" id="buton">Back</a></button>
                              </div>
                              @endif
                       <hr>
                              </div>

                        </div>
                @endforeach
      	       </div>
            </div>

    
        </div>

    </div>
</div>



@endsection