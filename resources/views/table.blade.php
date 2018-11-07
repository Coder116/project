@foreach($book as $b)
            <tr>
              <th scope="row">{{$b->id}}</th>
              <td>{{$b->title}}</td>
              <td>{{$b->description}}</td>
              <td>{{$b->fmd}}</td>
              <td>  
                <img src="{{url('/images/'.$b->image)}}" width="150px" >
                </td>
                <td>
                    <a> 
                        <button type="button" class="btn btn-info" data-title="{{$b->title}}" data-description="{{$b->description}}" data-id={{$b->id}} data-fmd="{{$b->fmd}}" data-toggle="modal" data-target="#edit">Edit</button>
                    </a>
                        <button type="submit" class="btn btn-danger" data-id={{$b->id}} data-toggle="modal" data-target="#delete_book">Delete</button>
                </td>
            </tr>
            @endforeach