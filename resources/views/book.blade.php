@extends('layouts.app');

@section('content')

    <div class="container">
        <a href="{{route('book.create')}}"><button type="button" class="btn btn-primary">Add</button></a>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Title</th>
              <th scope="col">Description</th>
              <th scope="col">FMD</th>
              <th scope="col">Image</th>
              <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody id="body_book">   
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
            
          </tbody>
        </table>
    </div>
    <!-- Modal -->
                <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        {{-- <h4 class="modal-title" id="myModalLabel">Edit Book</h4> --}}
                      </div>
                      <form  id="book_form" enctype="multipart/form-data>
                          @csrf
                        <div class="modal-body">
                            <input type="hidden" name="id" id="id" value="">
                              @include('edit')

                        </div>

                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data_dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary" id="book_save">Save</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

              <!-- Modal -->
                <div class="modal modal-danger fade" id="delete_book" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      </div>
                      <form action="{{route('book.destroy',$b->id)}}" method="post">
                          {{method_field('DELETE')}}
                          @csrf          
                        <div class="modal-body">
                            <p class="text-center">
                              Bạn có muốn xóa ko?
                            </p>
                            <input type="hidden" name="id" id="id" value="">

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                          <button id="do_delete_book" type="submit" class="btn btn-warning">Delete</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                  

    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
        
        $('#edit').on('show.bs.modal', function(event){

            var button = $(event.relatedTarget)
            var title = button.data('title')
            var id = button.data('id')
            var description = button.data('description')
            var fmd = button.data('fmd')
            var blah = button.data('blah')
            // var image = button.data('image')
            var modal = $(this)

            modal.find('.modal-body #id').val(id)
            modal.find('.modal-body #title').val(title)
            modal.find('.modal-body #description').val(description)
            modal.find('.modal-body #fmd').val(fmd)
            modal.find('.modal-body #blah').val(blah)
        });

        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                  $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function() {
            readURL(this);
        });

        $('#book_save').on('click',function(e){
          // console.log($("#imgInp").val());
          var submitData = {
              '_token': $('input[name=_token]').val(),
              'id': $("#id").val(),
              'title': $("#title").val(),
              'description': $("#description").val(),
              'fmd': $("#fmd").val(),
              'imgInp': $("#imgInp").val()
            };
            submitData = JSON.stringify(submitData);
          e.preventDefault();
          $.ajax({
            type: "PATCH",
            url: "{{route('book.update', $b->id)}}",
            // processData: false,
            contentType: false,
            cache: false,
            data: submitData,
            
          });

        });



        $('#delete_book').on('show.bs.modal', function (event) {
        //   // var button = $(event.relatedTarget) 
        //   // var book_id = button.data('id') 
        //   // var modal = $(this)
        //   // modal.find('.modal-body #id').val(id);
            
        })

        $('#do_delete_book').on('click', function(event){
          event.preventDefault();
            var id = $('#delete_book').serialize();
            $.ajax({
              type: 'DELETE',
              url: "{{route('book.destroy', $b->id)}}", 
              data: {
              id: id, 
                 "_token": "{{csrf_token()}}"
              },
            
            success: function(data){
              $('#delete_book').modal('toggle');
                $('#body_book').html(data);

              },
          });
        })



        $('#delete_user').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) 
          var user_id = button.data('id') 
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
        })

    </script>
@endsection

     
