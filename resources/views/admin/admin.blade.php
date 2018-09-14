

     
    <tr>
         <th scope="row"></th>
     
    
          <td>
          	<a href="/admin/{{$propose->id}}">
          		 {{$propose->title}}
          	</a>
          </td>
          <td>
            {{$propose->organization}}
          </td>
          <td>
            {{$propose->Submitted_by}}
          </td>
          
          <td>
            {{$propose->updated_at->
            diffForHumans()}}</td>
          @if($propose->stage=='accepted')
           <td>
                <button class="btn btn-info">
                       Accepted
                      
                </button>
          </td>
          @elseif ($propose->stage=='reject')
           <td>
                <button class="btn btn-success">
                      
                            Rejected
                     
                </button>
          </td>
          @elseif($propose->stage=='stageone')
           <td>
                <button class="btn btn-info">
                          Stageone                   
                </button>
          </td>
          @elseif($propose->stage== 'stagetwo')
          <td>
          <button class="btn btn-info">
                          Stagetwo                   
          </button>
          </td>
          @else
          <td>
          <button class="btn btn-info">
                        Unreviewed                 
          </button>
          </td>
          @endif
          <td>
          	<button class="btn btn-primary">
          		<a href="/admin/{{$propose->id}}" id="buton" >
          			View
          		</a> 
          	</button>
          </td>


 	</tr>
  