</div id="one">
 <div class="body" >
  <div>
   
  </div>
   </div>
   <div class="head" id="body">
      <div class="tittle">
         <h1>OneLove</h1>
      </div>
      <div class="navigation">
          <div class="navv">

              <nav id="" class="navbar navbar-expand-lg navbar-light bg-light">
                          <div class="container-fluid">
                           
                          
                            <form class="navbar-form   pull-right" id="button" action="/">
                                               
                                 <span id="butt">
                                    @if( auth()->check() )
                                      
                         
                                        <a class="" id="but" href="">{{ auth()->user()->name }}</a>
                                         <a class="" id="but" href="/logout">Logout</a>
                                         @if(auth()->user()->verified == 1)
                                         <a class="" id="but" href="/userproposal">View Proposals</a>
                                         @endif
                            
                                    @else
                                        <a class="" id="but" href="/login">Log In</a>
                                        <a class="" id="but" href="/register">Register</a>

                                    @endif
                                </span>
                                            
                                                
                            </form>
                        </div>
            </nav>
        </div>
      </div>
  


   </div>