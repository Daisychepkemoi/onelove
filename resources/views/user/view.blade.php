@extends('layouts.master')
@section('content')
<div class="contents">


   @if($users->verified==true)
  
      @if($users->email==$propos->submitted_by)
            <div class="containers">
      
        <div class="panel-group">
 
              <div class="panel-body">
              	<div class="notify">
              		<div class="panel-heading">
                      Panel
                  </div>
      		
			    {{-- @foreach($propos as $propos) --}}
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
          		 
                  @if($propos->stage == 'stageone')

                        <div class="panel-heading"><h2 id="titl">Stage-1  Proposal</h2> </div>
                  @elseif($propos->stage == 'stagetwo')
                        <div class="panel-heading"> <h2 id="titl">Stage-2  Proposal</h2></div>
                  @elseif($propos->stage == 'Accepted')
                        <div class="panel-heading"> <h2 id="titl">Accepted  Proposal</h2></div>
                  @elseif($propos->stage == '')
                        <div class="panel-heading"><h2 id="titl">Unreviewed  Proposal</h2></div>
                  @else($propos->stage == 'reject')
                          <div class="panel-heading"><h2 id="titl">Rejected  Proposal</h2></div>
                  @endif



      			             <div class="panel-body" id="contentss">
                                @if($propos->draft==1)
                               <div class="col-sm-8">
                                   <form method="POST" action="/submitchange/{{$propos->id}}">
                                    {{ csrf_field() }}
                                        <div class="form-group">
                                          <label for="title">Title : <strong>*</strong></label>
                                          <input type="text" class="form-control" id="title" placeholder="title"  name="title" value="{{$propos->title}} " required="">
                                          
                                        </div>
                                        <div class="form-group">
                                          <label for="organization">Organization Name : <strong>*</strong></label>
                                          <input type="text" class="form-control" id="organization" placeholder="Organization Name"  name="organization" value="{{$propos->organization}}" required="">
                                          
                                        </div>

                                  
                                          <div class="form-group">
                                            <label for="address">Address: <strong>*</strong></label>
                                            <input type="text" class="form-control" id="address" placeholder="Address"  name="address" value="{{$propos->address}}" required="">
                                            
                                          </div>
                                          <div class="form-group">
                                            <label for="phone">Phone: <strong>*</strong></label>
                                            <input type="number" class="form-control" placeholder="Phone" id="phone"  name="phone" value="{{$propos->phone}}"  required="">
                                            
                                          </div>
                                           
                                          
                                          <div class="form-group">
                                            <label for="email">Email : <strong>*</strong></label>
                                            <input type="email" class="form-control" placeholder="Organization's Email" id="email" value="{{$propos->email}}"  name="email" required="">
                                            
                                          </div>
                                         <div class="form-group">
                                            <label for="summary">summary : <strong>*</strong></label>
                                            <textarea type="text" class="form-control" id="summary" placeholder="summary"  name="summary"  required="">
                                              {{$propos->summary}}
                                            </textarea> 
                                          </div>
                                         <div class="form-group">
                                            <label for="background">Background : <strong>*</strong></label>
                                            <textarea type="text" class="form-control" id="background" placeholder="background"  name="background"  required="">
                                              {{$propos->background}}
                                            </textarea>
                                          </div>
                                          <div class="form-group">
                                            <label for="activities">Activities: <strong>*</strong></label>
                                            <TEXTAREA type="activities" class="form-control" id="activities" placeholder="Activities"  name="activities" required="" >{{$propos->activities}}</TEXTAREA>
                                            
                                          </div>
                                          <div class="form-group">
                                            <label form="budget">Budget : <strong>*</strong></label>
                                            <input type="number" class="form-control" id="budget"  placeholder="budget" name="budget" value="{{$propos->budget}}"  required="">
                                          </div>
                                          
                                         
                                          
                                          <div class="form-group">
                                          
                                            <input type="hidden" class="form-control" id="submitted_by" placeholder="" value="{{$propos->submitted_by}}" name="submitted_by" readonly>
                                           </div>

                                          
                                          <button type="submit" name="save" value="savedraft" class="btn btn-primary"><a href=""></a>Submit</button> 
                                      
                                          <button type="submit" name="save" value="editdraft" class="btn btn-primary">save changes as Draft</button> 
                                          <button type="submit" name="save" value="deletedraft" class="btn btn-danger">delete</button> 
                          
                                          @include('layouts.errors')
                                    </form>
                              </div>
                              @else
                                <div class="prope">
                                  <div class="prop">
                                      <h2 id="bodyy">{{$propos->title}} Proposal</h2>
                                      <h3>Introduction</h3>
                                      <p>It's written by  {{$propos->submitted_by}} for {{$propos->organization}}  organization located in {{$propos->address}} whose contact address is : {{$propos->phone}} </p>
                                      <h3>summary</h3>
                                      <p>  {{$propos->summary}}</p>
                                      <h3>background Information</h3>.
                                      <p> {{$propos->background}}</p>
                                      <h3>Activities</h3>
                                      <p>  {{$propos->activities}}</p>
                                      <h3>Estimated Budget</h3>
                                      <p>Ksh :  {{$propos->budget}}</p>
                                        
                              
                                  </div>
                                  <button class="btn btn-primary"> <a href="/userback" id="buton">Back</a></button>
                              </div>
                              @endif
                       <hr>
                              </div>

                        </div>
               
      	       </div>
            </div>

    
        </div>
         {{-- @endforeach --}}
       @else
          <hr>
        <div class="mainboddy"> 
             <div class="navsbarr">


                <h2>Access denied</h2>
               <h3> You are not listed as a collaborator in this proposal</h3>
                
               
                
               
              </div>
             
        </div>
        @endif

        

      @else

     <hr>
        <div class="mainboddy"> 
             <div class="navsbarr">



               <h3> Welcome to One Love website <i>{{$users->name}}.</i><br>Your account isn't activated.</h3>
                
               <h3>Please check your email to <strong>Activate</strong> your account.</h3>
                
               
              </div>
             
        </div>
        @endif
        
</div>




@endsection