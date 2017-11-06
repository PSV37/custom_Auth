@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    @include('layouts.sidebar')
    <div class="col-md-2 col-lg-2">
    </div>
    <div class="col-md-8 col-lg-8 col-sm-12">
      <div>
        <h2>Added User :</h2>
        @if(session()->has('msg'))
        <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
          ×</button>
          {{session()->get('msg')}}
        </div>
        @endif
      </div>
      <table class="table">
        <thead class="thead-inverse">
          <tr>
            <th>User Profile</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>Role</th>
            <th>Edit</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <input type="hidden" name="edit_url" id="edit_url" value="{{url('user/ajax_edit')}}">
          @isset($addedusers)
          @foreach($addedusers as $user)
          <tr>
            <th scope="row"><a href="{{url('adduser/image/'.$user->id)}}"><img src="{{url('../')}}/images/{{$user->image}}" height="50px" class="img-rounded add_user_img"></a></th>
            <td>{{$user->firstname}}</td>
            <td>{{$user->lastname}}</td>
            <td>{{$user->gender}}</td>
            <td>{{$user->role_id}}</td>
            <td><a href="{{url('adduser/'.$user->id.'/edit')}}" class="btn btn-primary">Edit</a></td>
            <td><a  data-id="{{ $user->id }}" class="btn btn-primary edit_button">Edit</a></td>
            <td><a href="{{url('adduser/'.$user->id.'/delete')}}" class="btn btn-danger" onclick="return confirm('Are You Sure Deleted..')">Delete</a></td>
          </tr>
          @endforeach
          @endisset
          <tr>
            <td><b style="color: red">No User Added</b></td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="col-md-2 col-lg-2">
    </div>
  </div>

 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

</div>
@endsection
<script src="{{ asset('js/app.js') }}"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$('.edit_button').on('click',function(){

      var user_id = $(this).attr('data-id');
      var url = $('#edit_url').val();
      alert(url);
      var token = $('meta[name="csrf-token"]').attr('content');

          $.ajax({
          type:'post',
          url: url,
          data : {"user_id" : user_id ,  "_token": token},
          success:function(response){

                  var jsonObject =  JSON.parse( response );
                  if(jsonObject.status){
                    
                     $('#myModal').modal();
                      
                  }
             }
         });
});
});
</script>