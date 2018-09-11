

     
    <tr>
      <th scope="row"></th>
     
    
      <td>
      	<a href="/admin/{{$propose->id}}">
      		{{$propose->title}}
      	</a>
      </td>
      <td>{{$propose->organization}}</td>
      <td>{{$propose->Submitted_by}}</td>
      <td>{{$propose->created_at->diffForHumans()}}</td>

      <td>
      	<button class="btn btn-primary">
      		<a href="/admin/{{$propose->id}}" id="buton" >
      			View
      		</a> 
      	</button>
      </td>


 	</tr>
  